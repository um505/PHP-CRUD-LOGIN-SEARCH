<?php require_once 'actions/db_connect.php'; ?>
<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

if( !isset($_SESSION['user'])  && !isset($_SESSION['admin'])) {
  header("Location: index.php");
  exit;
}
if(isset($_SESSION['user'])){
    header("Location: user.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>


</head>
<body>
    
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item">
        <a class="nav-link active" type='button' href="add_animal.php">Add new pet</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="senior.php">Senior</a>
      </li>
     
      
      
    </ul>

    <form class="form-inline my-2 my-lg-0">
    <span class="mr-1"><?php echo "Hello ". $userRow['name' ]. "!"; ?></span> 
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success mr-1" type="submit">Search</button>
      <a class="btn btn-outline-danger" href="logout.php?logout">Sign Out</a>
    </form>
  </div>
</nav>

</header> 

<div class="container d-flex flex-wrap justify-content-around">


<?php

   
          $sql = " SELECT pets.pet_id, pets.pet_IMG, pets.pet_name, pets.age, `location`.city, `location`.ZIP
          FROM pets
          INNER JOIN `location` ON pets.location_id_FK=`location`.location_id";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
               
                echo "<div class='card pet mt-3 mr-3 col-3' style='width: 20vw;'>";
                echo  "<img src='".$row['pet_IMG']."'class='card-img-top'><div class='card-body'> <h5 class='card-title'>".$row['pet_name' ]."</h5><p class='card-text'>" .$row['age']." Years Old</p>".$row['city'].", " .$row['ZIP']."<br><a href='pet_info.php?pet_id=" .$row['pet_id']."' class='mt-2 btn btn-primary'>More Info</a>
                <a class='mt-2 ml-1 btn btn-warning' href='update_animal.php?pet_id=" .$row['pet_id']."'>Update</a><a class='mt-2 ml-1 btn btn-danger' href='delete_animal.php?pet_id=" .$row['pet_id']."'>Delete</a>" ;
                echo" </div>
                </div>";
               }
           } else  {
               echo  "No Data Avaliable";
           }
            ?>
<?php require_once 'footer.php'; ?>
