<?php 
include_once "assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>WELCOME TO FLAMPKART</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css\body.css">
    <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cardflip.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}

/* Thick red border */
hr.new4 {
  border: 1px solid red;
  width: 1450px;
  margin: auto;
}


body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}
.contect{
  width: 1550px;
}
/* Large desktop */  
@media (min-width: 1400px) { ... }    
 
/* Small devices (i.e, tablets, small desktops and up) */
@media (min-width: 700px) and (max-width: 950px) { ... }
</style>


  </head>

  <body>
    <!--this will includer header file-->
    <?php include"assets/header.php";?>
<?php include"assets/i.php";?>

<br>
<hr class="new4">
<br>
<center><h1>CITIES SHOP</h1></center>
 <div class="col-100 col-lg-100 col-md-100">
              <div class="row">
               


               <?php

                /*if the user will search by name of product then this if will be executed and filterred data will be shown*/
                  if(isset($_GET['find'])){
                      $search = $_GET['search'];
                      $call = mysqli_query($con,"SELECT * FROM vendor WHERE shop_name LIKE '%$search%' AND area_name='bahubali'");
                    }

                /*if the user will search category wise then this elseif will be executed and filterred data will be shown*/
                  elseif(isset($_GET['cat'])){
                      $cat = $_GET['cat'];
                      $call = mysqli_query($con,"SELECT * FROM vendor WHERE area_name='$cat'");
                    }

              /* if the user will directly go to the products page then this else will be executed without filteration*/
                  else{
                      $call = mysqli_query($con,"SELECT * FROM vendor WHERE area_name='bahubali'"); 
                       /*collects all data from product table*/
                    }
                      $count = mysqli_num_rows($call); 
                       /*$count will store the no. of row in product*/
                      if ($count > 0):
                    while($row = mysqli_fetch_array($call)):  
                      /*while loop starts and fetch one-by-one row in $row variable*/
                ?>

           <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
                                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"><!--?action=add&id=<?php echo $row["v_id"]; ?>-->

                            <div style=" padding: 16px;  margin-bottom: 10px; box-shadow: 1px 2px 5px grey; box-align: center;">
                              <center><?php echo $row["Shop_Name"]; ?></center>
                            <a href="shop.php?p_id=<?= $row['v_id'];?>"><img src="image\<?= $row['v_img'];?>" alt="" height="190px" class="w-100"></a>

<center>


                           <p style="text-align:left" class="text-dark"><b>VENDOR NAME :-</b><?php echo $row["v_f_name"]; ?><?php echo $row["v_L_name"]; ?></p>

                           <p style="text-align:left" class="text-dark"><b>CONTACT NO :-</b><?php echo $row["v_phn"]; ?></p>
                          
                            </center>
                            <?php
                                if(isset($_SESSION['customer'])):
                                  $log=$_SESSION['customer'];


                                  $cust = mysqli_query($con,"SELECT * FROM customer WHERE c_email='$log'");
                                  $cust_row = mysqli_fetch_array($cust);
                                  $c_id=$cust_row['c_id'];
                              ?>



                                                          <input type="hidden" name="v_id" value="<?php echo $row['v_id'];?>">
                                                          <input type="hidden" name="v_email" value="<?php echo $row['v_email'];?>">
                                                          <input type="hidden" name="c_id" value="<?php echo $c_id;?>">

                                                            <input type="hidden" name="hidden_image" value="<?php echo $row["v_img"]; ?>" />

                                                          <input type="hidden" name="hidden_name" value="<?php echo $row["shop_name"]; ?>" />

                                                          

                            <?php endif?>

                          </div>
                        </form>
                </div>

                <?php endwhile;

              else:  /*if no product is available related to search the this else will be executed*/
                ?>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> This area is not available shops.</h1>
                      </div>
                  </div>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>
 <div class="row">
                <div class="col-12" style="text-align:right;">
                  <b> <button class="btn btn-success"  id="info"><a href="shop.php">MORE SHOPS</a></button></b>
                </div>
                <br><br>
<hr class="new4">

   <br><br><br>


<!-- About Section -->
<div class="w3-container"  id="about">
  <h3 class="w3-center">ABOUT THE COMPANY
  </h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
  </div>
</div>



  <!-- Newsletter -->
  <div class="contect">
  <div class="w3-container">
    <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off">
      <h2>Get the best offers first!</h2>
      <p>Join our newsletter.</p>
      <label>E-mail</label>
      <input class="w3-input w3-border" type="text" name="S_email" placeholder="Your Email address">
      <button type="button" name="ok" class="w3-button w3-red w3-margin-top">Subscribe</button>
  </div>
</div>
  
  <!-- Contact -->
  <div class="contect">
  <div class="w3-container">
    <h2>Contact</h2>
    <p>Let us book your next trip!</p>
    <i class="fa fa-map-marker" style="width:30px"></i> Seoni , (M.P.)<br>
    <i class="fa fa-envelope" style="width:30px"> </i> Email: FlampkartSeoni_2020@gmail.com<br>
    <form action="index.php" metohd="POST">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name"  name="Name" required></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email"  name="Email" required></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Phone number" name="Phone_No" required></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" name="message" required></p>
      <p><button type="submit" class="w3-button w3-black w3-padding-large" name="submit" >SEND MESSAGE</button></p>
    </form>
  </div>
 
  </div>
  
<!-- End page content -->
<div style="background:url('image/map.png');background-repeat: no-repeat;background-size: cover;height: 500px; width: 1500px;margin: auto;margin-bottom: 1%; ">
            <!--in the below section card code is written-->
        
</div>


  <!--  <div class="container-fluid shadow" id="costomer_view">
      <img src="image\milkbnner.jpg" alt="" style="width:100%">
      <img src="https://radianceyogany.com/wp-content/uploads/2017/01/Natalie-Face-Circle.png" alt="" class="custmr">
      <h1 class="custmr" id="our_custm">our customer stories</h1>
    </div>-->
<?php include"assets/footer.php";?>

        </body>
</html>
 <script>
  <?php
 if(isset($_POST['submit']))
 {
   $Name=$_POST['Name'];
   $Phone_No=$_POST['Phone_No'];
   $Email=$_POST['Email'];
   $message=$_POST['message'];
   $duplicate=mysqli_query($con,"SELECT * FROM contact WHERE Email='$Email'");
      if(mysqli_num_rows($duplicate)>0)
      {
       echo "<script>thanks</script>";
   }
   else{

   $query = mysqli_query($con,"INSERT INTO contact (Name,Phone_No,Email,message) VALUES ('$Name','$Phone_No','$Email','$message')");
   
}
    echo"<script>alert('This Email Id  Already Exist')</script>";

 }


 ?>
</script>

