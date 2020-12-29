<?php 
include_once "assets/config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>vendor registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
    background-color: white;
}

.registration-form{
    padding: 50px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px blue;
}

.registration-form .form-icon{
    text-align: center;
    background-color: red;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
    border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
</style>
</head>
<body>
    <div class="registration-form">
                    <form method="post" action="v_signup.php" enctype="multipart/form-data">
            <center>
              <img src="image\logo10.png" alt=""  style="font-family: 'Modak', cursive; width: 140px;height: 60px" > 
            </center>
            <br><br>
            <div class="form-group">
                <input type="text" class="form-control item" id="firstname" name="v_f_name" placeholder="First name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="firstname" name="v_L_name" placeholder="Last name">
            </div>
                <div class="form-group">
                <input type="text" class="form-control item" id="shop_name" name="shop_name" placeholder="Enter shop name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="v_pass" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="v_email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="number" class="form-control item" id="inp" name="v_phn" placeholder="phone number">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="address" value="seoni" name="v_city" placeholder="City">
            </div>
    <div class="form-group">
        <select name="area_name"  class="form-control rounded-pill form-control-lg">
                                         <?php
                                         /*this $cat variable will store all the  product categories available in DB*/
                                            $cat = mysqli_query($con,"SELECT * FROM area");

                                            /*this while loop will fetch all the selected row in option tag one-by-one*/
                                            while ($c = mysqli_fetch_array($cat)):
                                          ?>
                                          <option><?= $c['area_name'];?></option>

                                          <?php endwhile;?>
                                    </select>
                                </div>
                   

             <div class="col-12 form-group">
                                      <label for="" class="text-white">Profile Photo</label>
                                          <input type="file" name="v_img" class="form-control rounded-pill form-control-lg" >
                                  </div>
            <div class="form-group">
                <button type="submit" name="v_register" class="btn btn-block create-account">Create Account</button>
                <center><p>Already registered
                  <a href="login_v.php"> Log In</a></p></center>
            </div>
        </form>
        
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
   
 <?php
 if(isset($_POST['v_register'])){

   $v_f_name=$_POST['v_f_name'];
   $v_phn=$_POST['v_phn'];
   $v_email=$_POST['v_email'];
   $area_name=$_POST['area_name'];
   $v_pass=$_POST['v_pass'];
   $v_L_name=$_POST['v_L_name'];
   $v_age=$_POST['v_age'];
   $shop_Name=$_POST['shop_Name'];
   $v_gen=$_POST['v_gen'];
   $v_city=$_POST['v_city'];
   $v_img = $_FILES['v_img']['name'];
   $v_img_tmp =  $_FILES['v_img']['tmp_name'];
   move_uploaded_file($v_img_tmp,"image/$v_img");

   $duplicate=mysqli_query($con,"SELECT * FROM vendor WHERE v_email='$v_email'");
      if(mysqli_num_rows($duplicate)>0)
      {
       echo "<script>alert('This Email Id  Already Exist')</script>";
   }
   else{

   $query = mysqli_query($con,"INSERT INTO vendor (v_f_name,v_phn,v_email,area_name,v_pin,v_pass,v_img,v_L_name,v_age,v_gen,v_city,v_state,shop_Name) VALUES ('$v_f_name','$v_phn','$v_email','$area_name','$v_pin','$v_pass','$v_img','$v_L_name','$v_age','$v_gen','$v_city','$v_state','$shop_Name')");
       echo"<script>window.open('login_v.php','_self')</script>";

}

 }


 ?>






</body>
</html>
