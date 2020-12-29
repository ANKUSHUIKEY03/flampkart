<?php 
include"config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: vendor_login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">

  </head>

  <body>
  <?php include "hd.php"; ?>
  <div class="container-fluid mt-4">
    <div class="row">
       
      <div class="col-lg-3">
     <?php include "include/side.php";?>
      </div>

       
  </body>
</html>
