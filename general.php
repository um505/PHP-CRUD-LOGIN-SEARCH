<?php require_once 'actions/db_connect.php'; ?>
<?php require_once 'head.php'; ?>


<?php
       
         
           $sql = " SELECT pets.pet_IMG, pets.pet_name, pets.age, `location`.city, `location`.ZIP
          FROM pets 
          INNER JOIN `location` ON pets.location_id_FK=`location`.location_id WHERE (senior='no')";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<div class='card pet mt-3 mr-3 col-3' style='width: 20vw;'>";
                echo  "<img src='".$row['pet_IMG']."'class='card-img-top'><div class='card-body'> <h5 class='card-title'>".$row['pet_name' ]."</h5><p class='card-text'>" .$row['age']." Years Old</p>".$row['city'].", " .$row['ZIP']."<br><a href='#' class='mt-2 btn btn-primary'>More Info</a>" ;
                echo" </div>
                </div>";
               }
           } else  {
               echo  "No Data Avaliable";
           }
            ?>
<?php require_once 'footer.php'; ?>
