<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}
  //IF Session "Admin" is set you are redirected to admin.php
  if(isset($_SESSION['admin']) != ''){
    header("Location: admin.php");
    exit;
  }
$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($connect, "SELECT * FROM users WHERE email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 


  if( $count == 1 && $row['pwd']==$password ) {
      
     if($row["permissions"]==admin) {
      $_SESSION['admin'] = $row['user_id'];
      header("Location: admin.php");
    }else{
      $_SESSION['user'] = $row['user_id'];
      header( "Location: home.php");
    }
    }else {
      $errMSG = "<span class='alert alert-danger'>Incorrect login Data, try again." ;
    }
  }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
 
   <div class="container text-center">
            <h2 class="mt-5">Sign In.</h2 >
            <img class="mb-4" src="img/pawprint.png" alt="" width="72" height="72">
           
         
               <?php
   if ( isset($errMSG) ) {
 
   ?>
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php
  }
  ?>
         
           
            <input  type="email" name="email"  class="form-control mt-2" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" />
       
            <span class="text-danger"><?php  echo $emailError; ?></span >
 
         
            <input  type="password" name="pass"  class="form-control mt-3" placeholder ="Your Password" maxlength="15"  />
       
           <span  class="text-danger"><?php  echo $passError; ?></span>
           
            <button  type="submit" class="btn btn-primary mt-3 mb-3" name= "btn-login">Sign In</button> <br>
         
         
            
            <a href="register.php">Sign Up Here...</a>
     
         
   </form>
   </div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>