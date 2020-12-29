<?php 
include_once "assets/config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer registration</title>
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
    box-shadow: 0px 2px 10px #ff4d4d;
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
                    <form method="post" action="signup.php" enctype="multipart/form-data">
            <center>
              <img src="image\logo10.png" alt=""  style="font-family: 'Modak', cursive; width: 140px;height: 60px" > 
            </center>
            <br><br>
            <div class="form-group">
                <input type="text" class="form-control item" id="firstname" name="c_f_name" placeholder="First name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="firstname" name="c_L_name" placeholder="Last name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" name="c_pass" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" name="c_email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="number" class="form-control item" id="inp" name="c_phn" placeholder="phone number">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="address" name="c_add" placeholder="Address">
            </div>
             <div class="col-12 form-group">
                                      <label for="" class="text-white">Profile Photo</label>
                                          <input type="file" name="c_img" class="form-control rounded-pill form-control-lg" >
                                  </div>
            <div class="form-group">
                <button type="submit" name="c_register" class="btn btn-block create-account">Create Account</button>
                <center><p>Already registered</p>
                 <h2> <a href="login_c.php"> Log In</a></h2></center>
            </div>
        </form>
        
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
   




<?php
 if(isset($_POST['c_register']))
 {
 $c_f_name=$_POST['c_f_name'];
   $c_email=$_POST['c_email'];
   $c_pass=$_POST['c_pass'];
   $c_L_name=$_POST['c_L_name'];
   $c_phn=$_POST['c_phn'];
   $c_add=$_POST['c_add'];
   $c_img = $_FILES['c_img']['name'];
   $c_img_tmp =  $_FILES['c_img']['tmp_name'];
   move_uploaded_file($c_img_tmp,"image/$c_img");

   $duplicate=mysqli_query($con,"SELECT * FROM customer WHERE c_email='$c_email'");
   if(mysqli_num_rows($duplicate)>0)
   {
      echo "<script>alert('This Email Id is Already Existed')</script>";
   }
   else{
     $query = mysqli_query($con,"INSERT INTO customer (c_f_name,c_phn,c_email,c_add,c_pass,c_img,c_L_name)  VALUES ('$c_f_name','$c_phn','$c_email','$c_add','$c_pass','$c_img','$c_L_name')");
  echo "<script>window.open('login_c.php','_self')</script>";


   }

 }


 ?>

</body>
</html>
