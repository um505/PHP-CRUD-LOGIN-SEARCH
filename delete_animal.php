
<?php 

require_once 'actions/db_connect.php';

if ($_GET['pet_id']) {
   $pet_id = $_GET['pet_id'];

   $sql = "SELECT * FROM pets WHERE pet_id = {$pet_id}" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete Animal</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<div class="container text-center mt-5">

<h3>Do you really want to delete this media file?</h3>
<form action ="actions/a_animal_delete.php" method="post">

   <input type="hidden" name= "pet_id" value="<?php echo $data['pet_id'] ?>" />
   <button type="submit"class="btn btn-danger">Yes, delete it!</button >
   <a href="index.php"><button type="button" class="btn btn-secondary">No, go back!</button></a>
</form>
</div>
</body>
</html>

<?php
}
?>