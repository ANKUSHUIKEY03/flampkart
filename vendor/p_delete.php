<?php
include_once"config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $disable=mysqli_query($con, "UPDATE product
      set
    p_status='Not Available' where p_id='$del'");
      header("location: v_products.php");
}
