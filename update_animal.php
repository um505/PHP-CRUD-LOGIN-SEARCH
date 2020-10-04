<?php 

require_once 'actions/db_connect.php';

if ($_GET['pet_id']) {
   $pet_id = $_GET['pet_id'];

$sql = "SELECT * FROM pets WHERE pet_id = {$pet_id}";
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();
   
   $connect->close();
  
?>
<!DOCTYPE html>
<html>
<head>
   <title >Update Animal</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h3 class="mt-5">Update new Animal</h3>
   <form action="actions/a_update_animal.php" method= "post">
   <div class="form-row mt-5">
  <div class="form-group col-4">
    <label>Pet Name</label>
    <input type="text" class="form-control" name="pet_name" value="<?php echo $data['pet_name'] ?>">
  </div>
  <div class="form-group col-4">
    <label>Age</label>
    <input type="text" class="form-control" name="age" value="<?php echo $data['age'] ?>">
  </div>
  <div class="form-group col-4">
    <label>IMG</label>
    <input type="text" class="form-control" name="pet_IMG" value="<?php echo $data['pet_IMG'] ?>">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-4">
    <label>Type</label>
    <select class="form-control" name="type" value="<?php echo $data['type'] ?>">
      <option value="small">Small</option>
      <option value="large">Large</option>
    </select>
  </div>
  <div class="form-group col-5">
    <label>Website</label>
    <input type="text" class="form-control" name="website" value="<?php echo $data['website'] ?>">
  </div>
<div class="form-group col-3">
    <label>Date of availability</label>
    <input type="date" class="form-control" name="date_available" value="<?php echo $data['date_available'] ?>"></input>
  </div>
  </div>
  <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name="description" value="<?php echo $data['description'] ?>" rows="3"></input>
  </div>
  <div class="form-group">
    <label>Hobbies</label>
    <input type="text" class="form-control" name="hobbies" value="<?php echo $data['hobbies'] ?>" rows="3"></input>
  </div>
  <div class="form-row">
  <div class="form-group col-6">
    <label>Location</label>
    <select class="form-control" value="<?php echo $data['location_id_FK'] ?>" name="location_id_FK">
      <option value="1">Vienna</option>
      <option value="2">Baden</option>
    </select>
  </div>
  <div class="col-4 ml-5">
  <label>Senior?(Older 8 years old)</label><br>
  <div class="form-check form-check-inline" >
  <input class="form-check-input" type="checkbox"  name="senior"  value="yes">
  <label class="form-check-label">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="senior" value="no">
  <label class="form-check-label">No</label>
</div>
</div>

  </div>
<div class="text-center">
<input type= "hidden" name= "pet_id" value= "<?php echo $data['pet_id']?>" />
  <button type="submit" class="btn btn-success" name = "btn-signup">Update</button>
  <a href= "admin.php"><button class="btn btn-secondary" type="button">Back</button></a>
  </div>
</form>
</div>

</body >
</html >
<?php
}
?>

