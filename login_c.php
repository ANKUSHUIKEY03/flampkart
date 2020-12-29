<?php include_once "assets/config.php";
session_start();

if(isset($_SESSION['customer'])):
  header("location: index.php");
endif;
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .login-dark {
  height:1000px;
  background-color: white;
  background-size:cover;
  position: static;
}

.login-dark form {
  max-width:320px;
  width:90%;
  background-color: white;
  padding:40px;
  border-radius:4px;
  transform:translate(-50%, -50%);
  position:absolute;
  top:50%;
  left:50%;
  color: black;
  box-shadow:0px 2px 10px red;
}

.login-dark .illustration {
  text-align:center;
  padding:15px 0 20px;
  font-size:100px;
  color:#2980ef;
}

.login-dark form .form-control {
  background:none;
  border:none;
  border-bottom:1px solid #434a52;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
}

.login-dark form .btn-primary {
  background:#214a80;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:26px;
  text-shadow:none;
  outline:none;
}

.login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
  background:#214a80;
  outline:none;
}

.login-dark form .forgot {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}

.login-dark form .forgot:hover, .login-dark form .forgot:active {
  opacity:1;
  text-decoration:none;
}

.login-dark form .btn-primary:active {
  transform:translateY(1px);
}

</style>
</head>

<body>
    <div class="login-dark">
        <form action="login_c.php" method="post" autocomplete="off">
            <h2 class="sr-only">Login Form</h2>
            <center>
            <img src="image\logo10.png" alt=""  style="font-family: 'Modak', cursive; width: 140px;height: 60px" > 
        </center>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="
            color: black;"></i></div>
            <div class="form-group">
                <input class="form-control" type="email" name="c_email" placeholder="Email"></div>
            <div class="form-group">
                <input class="form-control" type="password" name="c_pass" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-danger btn-block" type="submit" name="c_login">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
if(isset($_POST['c_login'])){
    $c_email = $_POST['c_email'];
    $c_pass =$_POST['c_pass'];

    $query = mysqli_query($con,"SELECT * FROM customer WHERE c_email='$c_email' AND c_pass='$c_pass' ");
    $count = mysqli_num_rows($query);

    if($count > 0){
            $_SESSION['customer'] = $c_email;
            echo"<script>window.open('index.php','_self')</script>";
    }
    else{
        echo "<script>alert('your user name or password is not matched')</script>";
    }
}
?>





