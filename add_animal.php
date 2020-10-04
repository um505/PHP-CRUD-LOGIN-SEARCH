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
    


    <div class="container">
    <h3 class="mt-5">Add new Animal</h3>
   <form action="actions/a_add_animal.php" method= "post">
   <div class="form-row mt-5">
  <div class="form-group col-4">
    <label>Pet Name</label>
    <input type="text" class="form-control" name="pet_name" placeholder="Pet Name">
  </div>
  <div class="form-group col-4">
    <label>Age</label>
    <input type="text" class="form-control" name="age" placeholder="Age">
  </div>
  <div class="form-group col-4">
    <label>IMG</label>
    <input type="text" class="form-control" name="pet_IMG" placeholder="IMG">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-4">
    <label>Type</label>
    <select class="form-control" name="type">
      <option value="small">Small</option>
      <option value="large">Large</option>
    </select>
  </div>
  <div class="form-group col-5">
    <label>Website</label>
    <input type="text" class="form-control" name="website" placeholder="Website">
  </div>
<div class="form-group col-3">
    <label>Date of availability</label>
    <input type="date" class="form-control" name="date_available" rows="3"></input>
  </div>
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea type="text" class="form-control" name="description" placeholder="Description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Hobbies</label>
    <textarea type="text" class="form-control" name="hobbies" placeholder="Hobbies" rows="3"></textarea>
  </div>
  <div class="form-row">
  <div class="form-group col-6">
    <label>Location</label>
    <select class="form-control" name="location_id_FK">
      <option value="1">Vienna</option>
      <option value="2">Baden</option>
    </select>
  </div>
  <div class="col-4 ml-5">
  <label>Senior?(Older 8 years old)</label><br>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox"  name="senior" value="yes">
  <label class="form-check-label">Yes</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="senior" value="no">
  <label class="form-check-label">No</label>
</div>
</div>


  </div>
<div class="text-center">
  <button type="submit" class="btn btn-success">Add</button>
  <a href= "admin.php"><button class="btn btn-secondary" type="button">Back</button></a>
  </div>
</form>
</div>
</body>
</html>