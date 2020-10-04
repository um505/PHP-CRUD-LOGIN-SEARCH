<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Animal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</script>
</head>
<body>
<?php 

require_once 'db_connect.php';
if ($_POST) {
    $pet_name = $_POST['pet_name'];
    $age = $_POST['age'];
    $pet_IMG = $_POST[ 'pet_IMG'];
    $type = $_POST['type'];
    $website = $_POST['website'];
    $date_available = $_POST['date_available'];
    $description = $_POST['description'];
    $hobbies = $_POST['hobbies'];
    $senior = $_POST['senior'];
    $location_id_FK = $_POST['location_id_FK'];

   $pet_id = $_POST['pet_id'];

$sql = "UPDATE pets SET pet_name ='$pet_name', age='$age', pet_IMG='$pet_IMG', `type`='$type', `description`='$description', senior='$senior', website='$website', hobbies='$hobbies', date_available='$date_available', location_id_FK='$location_id_FK' WHERE pet_id = '$pet_id'" ;
  



   if($connect->query($sql) === TRUE) {
    echo "<h2 class=\"text-center pt-2\">Record Successfully Updated!</h2>" ;
    echo "<div class=\" d-flex justify-content-center mt-5\">";
    echo "<a href= '../admin.php'><button type=\"submit\" class=\"btn btn-info\">Home</button></a>";
    echo "<a href='../update_animal.php?pet_id=" .$pet_id."'><button type=\"submit\" class=\"btn btn-secondary ml-1\">Back</button></a>";
    echo "</div>";
   } else  {
       echo "Error " . $sql . ' ' . $connect->connect_error;
   }
   $connect->close();
}



?>
