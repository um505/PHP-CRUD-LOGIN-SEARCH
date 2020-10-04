<?php 

require_once 'actions/db_connect.php';

if ($_GET['pet_id']) {
   $pet_id = $_GET['pet_id'];

$sql = "SELECT * FROM pets WHERE pet_id = {$pet_id}";
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();
   
   $connect->close();
  
?>
<?php require_once 'head.php'; ?>

<div class="container d-flex justify-content-beetween mt-5">
    <div class="col-5 pt-2 "><img class="rounded" src="<?php echo $data['pet_IMG'] ?> "width="100%"></div>
    <div class="col-7 pt-3 border">
    <h2> Hi! My name is <?php echo $data['pet_name']?> and I'm  <?php echo $data['age'] ?> Years old </h2> <hr>
    <h5>About me:</h5>
    <p><?php echo $data['description'] ?></p><hr>
    <h5>I like to:</h5>
    <p> <?php echo $data['hobbies'] ?></p><hr>
    <h5>You can peak me up at: <?php echo $data['date_available'] ?></h5><hr>
    <h5>My website:</h5>
    <p>
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4H2.255a7.025 7.025 0 0 1 3.072-2.472 6.7 6.7 0 0 0-.597.933c-.247.464-.462.98-.64 1.539zm-.582 3.5h-2.49c.062-.89.291-1.733.656-2.5H3.82a13.652 13.652 0 0 0-.312 2.5zM4.847 5H7.5v2.5H4.51A12.5 12.5 0 0 1 4.846 5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5H7.5V11H4.847a12.5 12.5 0 0 1-.338-2.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12H7.5v2.923c-.67-.204-1.335-.82-1.887-1.855A7.97 7.97 0 0 1 5.145 12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11H1.674a6.958 6.958 0 0 1-.656-2.5h2.49c.03.877.138 1.718.312 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12h2.355a7.967 7.967 0 0 1-.468 1.068c-.552 1.035-1.218 1.65-1.887 1.855V12zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5h-2.49A13.65 13.65 0 0 0 12.18 5h2.146c.365.767.594 1.61.656 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
</svg> <?php echo $data['website'] ?>
</p>
  </div>   
  
</div>
<div class="container mt-2">
<h5>You can found me here:</h5>  
<?php
    
    if ( $data['location_id_FK'] == 1 ){
        echo"<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2658.7504505609027!2d16.38826505201986!3d48.21142245389042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d070c37d0b227%3A0xb3fd9bef437db6a2!2sInternationaler%20Bund%20der%20Tierversuchsgegner!5e0!3m2!1sen!2sat!4v1601668567966!5m2!1sen!2sat' width='100%' height='500vw' frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>";

    } else{
        echo "<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2670.0100114387615!2d16.265207352016763!3d47.99419366901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476db10f7afe060b%3A0xb8824bf2eacd83a4!2sTierheim%20Stadt%20Baden%20und%20Bezirk!5e0!3m2!1sen!2sat!4v1601669282247!5m2!1sen!2sat' width='100%' height='500vw' frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>";
    }

require_once 'footer.php';

}
?>

