<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: white;
  cursor: pointer;
  box-shadow: 1px 2px 10px grey;
}

.topnav a {
  float: left;
  display: block;
  color: red;
  text-align: right;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
  position: absolute;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: #0000CD;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: relative;
  background-color: #0000CD;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}
.topnav-right {
  float: right;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: white;
  color: green;
  text-transform: uppercase;
}

.dropdown-content a:hover {
  background-color: grey;
  color: white;
}

.dropdown:hover .dropdown-content {
  display: block;
}
b{
  margin: auto;
  color: red;
}
b:hover{
  color: green;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
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
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
</head>
<body>
<?php
        if(isset($_SESSION['vendor'])): 
          $log = $_SESSION['vendor'];
          $query = mysqli_query($con,"SELECT * FROM vendor where v_email='$log'");
          $row = mysqli_fetch_array($query);

        ?>


<div class="topnav" id="myTopnav">
        <img src="logo10.png" alt=""  style="font-family: 'Modak', cursive; width: 160px;height: 60px" > 
        <div class="topnav-right">
         
      <img src="../image/<?= $row['v_img']; ?>" width="45px" height="45px" class="mr-2 rounded-circle"><b><?= $row['shop_Name'];?></b>
       <a href="index.php">Home</a>
      <a href="Dashboard.php">My Library</a>
        <a href="logout.php">Logout</a>
      </div>

      
   

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
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
  <?php endif; ?>
</body>
</html>







    
          



