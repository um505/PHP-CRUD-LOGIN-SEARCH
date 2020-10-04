<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

if( !isset($_SESSION['user'])  && !isset($_SESSION['admin'])) {
  header("Location: index.php");
  exit;
}

$res=mysqli_query($connect, "SELECT * FROM users WHERE `user_id`=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
<style>
  .result{
        position: absolute;        
        z-index: 999;
         top: 100%;
         background-color: ghostwhite;
         
        
    }
    .search-box input[type="text"], .result{
        width: 100%; 
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
</head>
<body>
    
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img  src="img/pawprint.png" width="30" height="30" alt="" loading="lazy">

  <a class="navbar-brand pl-2" href="home.php">Pet Adoption</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item">
        <a class="nav-link active" href="general.php">Small & Big</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="senior.php">Senior</a>
      </li>
     
      
      
    </ul>

    <form class="form-inline my-2 my-lg-0">
    <span class="mr-1"><?php echo "Hello ". $userRow['name' ]. "!"; ?></span> 
    <div class="search-box">
    <input type="text" class="form-control mr-sm-2 search-box" type="search" autocomplete="off" placeholder="Search by name"/>
          <div class="result"></div>
    </div>
       
        
    
      <button class="btn btn-outline-success mr-1" type="submit">Search</button>
      <a class="btn btn-outline-danger" href="logout.php?logout">Sign Out</a>
    </form>
  </div>
</nav>

</header> 

<div class="container d-flex flex-wrap justify-content-around">
