                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
<?php include"../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  header("location: admin_login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>

  <body>
  <?php include "include/header.php"; ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-lg-3">
      <?php include "include/side.php";?>
      </div>
      <!-- End Navbar -->
     
  </body>
</html>
