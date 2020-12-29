<!DOCTYPE html>
<html>
<title>Welcome to Flampkart</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
  <link href="css/magnific-popup.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
<body>
 
<!-- Header -->
<?php include"assets/hd.php";?>

<?php include"assets/i.php";?>


<!-- About Section -->
<div class="w3-container"  id="about">
  <h3 class="w3-center">ABOUT THE COMPANY
  </h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
      <p>Responsive is sometimes mobile friendly.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p>All you need is passion.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design</p>
      <p>Design is awesome & easy to useful evryone.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
      <p>Every systemis support.</p>
    </div>
  </div>
</div>


  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
   <h2>Contact</h2>
    <p>Let us book your next trip!</p>
    <i class="fa fa-map-marker" style="width:30px"></i> Seoni , (M.P.)<br>
    <i class="fa fa-envelope" style="width:30px"> </i> Email: FlampkartSeoni_2020@gmail.com<br>
    <form action="" method="POST">
      <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
       <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="Phone_No">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Comment" required name="message">
      <button class="w3-button w3-black w3-section" name="submit" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
   <!-- Newsletter -->
  <div class="contect">
  <div class="w3-container">
    <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off">
     <form action="index.php" method="POST">
      <h2>Get the best offers first!</h2>
      <p>Join our newsletter.</p>
      <label>E-mail</label>
      <input class="w3-input w3-border" type="text" name="S_email" placeholder="Your Email address">
      <button type="button" name="ok" class="w3-button w3-red w3-margin-top">Subscribe</button>
      </form>
  </div>
</div>
 <?php
 if(isset($_POST['ok']))
 {
   $S_email=POST['S_email'];
   $dup=mysqli_query($con,"SELECT * FROM subscribe");
      if(mysqli_num_rows($dup)>0)
      {
       echo "<script>alert('some mistakes')</script>";
   }
   else{

   $q = mysqli_query($con,"INSERT INTO subscribe (S_email) value ('$S_email')");
   
}
    echo"<script>alert('Thanks for subscribe')</script>";

 }


 ?>

<!-- Image of location/map -->
                <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29576.21495884912!2d79.53056549622939!3d22.086790784271393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a2ab003ceb2b715%3A0x307294a918b11bbb!2sSeoni%2C%20Madhya%20Pradesh%20480661%2C%20India!5e0!3m2!1sen!2sro!4v1601215251872!5m2!1sen!2sro" width="1025" height="450"  style="border:0;"></iframe>
                    </div>
                </div>
    
<!-- Footer -->
<?php include"assets/footer.php";?>

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
       echo "<script>alert('This email id already exist')</script>";
   }
   else{

   $query = mysqli_query($con,"INSERT INTO contact (Name,Phone_No,Email,message) value ('$Name','$Phone_No','$Email','$message')");
   
}
    echo"<script>alert('Your Feedback Successfully send')</script>";

 }


 ?>

</body>
</html>
 