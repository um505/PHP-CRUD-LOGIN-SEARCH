<?php 

$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "cr11_maxim_petadoption";

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {
     //echo "Successfully Connected";
}

?>