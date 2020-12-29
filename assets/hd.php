<!DOCTYPE html>
<html>
<title>Welcome to Flampkart</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  box-shadow: 1px 2px 10px grey;
}
.topnav img{
  float: left;
}
.topnav a {
  float: right;
  display: block;
  color: red;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: white;
  color: green;
  text-transform: uppercase;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
    margin-top: 2px;
  display: none;
  float: right;
  color: red;
  position: relative;
}
.topnav input[type=search] {
  width: 100px;
  height: 40px;
  margin-top: 5px;
  margin-bottom: 5px;
  box-sizing: border-box;
  border: 2px solid black;
  float: left;
  margin-left: 40%;
  position: relative;
  border-radius: 2px;
  font-size: 16px;
  background-color: white;
  background-position: 20px 20px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

.topnav input[type=search]:focus {
  width: 50%;
}
@media screen and (max-width: 600px) {
  .topnav input[type=search]{
  float: none;
  margin-left: 10px;
  display: block;
  padding: 16px;;
  }
}


@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
    color: red;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: center;
  }
}

</style>
<body>
 
<div class="topnav" id="myTopnav">
       <img src="image\logo10.png" alt=""  style="font-family: 'Modak', cursive; width: 120px;height: 60px" > 
  <a href="index.php">Home</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
   

  <a href="signup.php">Customer</a>
  <a href="v_signup.php">Vendor</a>

               
<a href="shop.php">Shop</a>
<a href="product.php">Product</a>

  <div class="container-fluid">
<form action="product.php"  method="get" class="form-inline" >
  <input type="search" name="search" placeholder="Search.."  required oninvalid="this.setCustomValidity('You are trying for empty search please enter the valid value')" oninput="this.setCustomValidity('')"  class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
  <input type="submit" value="Go"  name="find" style="height: 40px;">
</form>
</div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>