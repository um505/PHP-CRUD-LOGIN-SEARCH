<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
if(isset($_SESSION['admin']) != ''){
    header("Location: admin.php");
    exit;
  }

include_once 'actions/db_connect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
 $name = strip_tags($name);
 $name = htmlspecialchars($name);
 
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($connect, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO users( `name`,email,pwd) VALUES('$name','$email','$password')";
  $res = mysqli_query($connect, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
 
     <div class="container text-center">

            <h2 class=" mt-5">Sign Up</h2>
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
         
     
         

            <input type ="text"  name="name"  class ="form-control mt-3"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>"  />
     
               <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
         
   

            <input   type = "email"   name = "email"   class = "form-control mt-2"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>"  />
   
               <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
     
         
     
           
       
            <input   type = "password"   name = "pass"   class = "form-control mt-2"   placeholder = "Enter Password"   maxlength = "15"  />
           
               <span   class = "text-danger" > <?php   echo  $passError; ?> </span >
     
           

              
            <button   type = "submit"   class = "btn  btn-primary mt-2 "   name = "btn-signup" >Sign Up</button >
         
            <hr  />
         
            <a   href = "index.php" >Sign in Here...</a>
   
           
   </form >
   </div>
</body >
</html >
<?php  ob_end_flush(); ?>