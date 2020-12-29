  <?php 
include_once "assets/config.php";
?><!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap');
  body{
    padding: 0;
    margin:0;
    overflow-x: hidden;
  }
  h3{
    font-size: 32px;
    font-weight: 700;
  }
    .customcolor{
      background: black;
      padding-top: 60px;
      padding-bottom: 30px;
      color: #fff;
      font-family: 'Raleway', sans-serif;

    }
    .customcolor .col-md-3:nth-child(1) .fa{
      padding-right: 25px;
    }
    .customcolor .col-md-3:nth-child(2) .fa,.customcolor .col-md-3:nth-child(3) .fa{
      padding-right: 10px;
    }
    .customcolor ul {
      list-style-type: none;
      padding: 20px 10px;
      margin: 0;
      /*padding-top: 20px;
      padding-left: 10px;*/
    }
    .customcolor ul li{
      padding-top: 5px;
    }
    .customcolor a{
      text-decoration: none;
      color: #fff;
    }
    .customcolor a:hover{
      color:#D35400;
    }
    .customcolor span{
      font-size: 45px;
      text-transform: uppercase;
    }
    .form-control{
      height: 45px;
      border-radius: 2px;
      color: #ddd;
      margin-bottom: 20px;
    }
    .btn-custom{
      background: #D35400;
      color: #fff;
      padding: 10px 23px 10px 23px;
    }
    .btn-custom:hover{
      background:#6E2C00; 
      color:#fff;
    
      transition: .3s;

    }
    .bottom{
          background: black;
          color: #fff;
          padding-top: 20px;

    }
    .bottom ul{
      list-style-type: none;
      display: inline-flex;
    
    }
    .bottom ul li{
      padding-right: 30px;
      text-align: right;
    }
    .bottom a{
      text-decoration: none;
      color: #ddd;
    }
    .icon .fa{
      font-size: 30px;
      cursor: pointer;
    }
    .icon .fa:hover{
      color: #D35400;
    }
    @media(max-width: 768px){
      h3{
        padding-top: 30px;
      }
      .bottom{
        text-align: center;
      }
      .bottom .pull-right{
        float: right;
        text-align: center;
        padding-top: 20px;
      }
    }
    @media(max-width: 450px){
      .customcolor{
        text-align: center;
      }
      .customcolor .col-md-3:nth-child(1) .fa{
        padding-right: 15px;
        text-align: center;
      }
      .customcolor .pl-4{
        padding-left: 0 !important;
      }
      .customcolor .pr-4{
        padding-right: 0 !important;
      }
    }
  </style>
</head>
<body>
  <header>
    
  </header>
<footer class="customcolor">
  <div class="container-fluid">

    <div class="row pl-4 pr-4">
    <div class="col-md-3">
      <h1><span class="text-primary">F</span>L<span class="text-danger">A</span>M
        <span class="text-primary">P</span>K<span class="text-danger">A</span>R<span class="text-primary">T</span></h1>
      <p> Online Shopping in Cities Shops.</p>
      <p><a href="admin/index.php">LOGIN</a></p>
      <p class="pt-3 pb-3">Follow US</p>
      <div class="icon">
      <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
      <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
      <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
    </div>
    </div>
    <div class="col-md-2">
      <h3 style="color: white;">AREA</h3>
      <ul>
         <?php
                                         /*this $cat variable will store all the  product categories available in DB*/
                                            $cat = mysqli_query($con,"SELECT * FROM area");

                                            /*this while loop will fetch all the selected row in option tag one-by-one*/
                                            while ($c = mysqli_fetch_array($cat)):
                                          ?>
        <li><a href="shop.php"><i class="fa fa-angle-double-right"></i><?= $c['area_name'];?></a></li>
       <?php endwhile;?>
      </ul>
    </div>
    <div class="col-md-2">
      <h3 style="color: white;">CATEGORY</h3>
      <ul>
            <?php

                          $cat ="SELECT * FROM category";
                          $rel= mysqli_query($con,$cat);//stores all categories in $cat variable
                          while ($c = mysqli_fetch_array($rel)): //fetch each row in $c variable
                      ?>
            <li><a href="product.php"><i class="fa fa-angle-double-right"></i><?= $c['cat_title'];?></a></li>
        <?php endwhile;?>
      </ul>
    </div>
     <div class="col-md-4">
     <div class="w3-container">
  <img src="image\footer.png" class="w3-image" style="width:100%">
</div>
  </div>
  </div>
  </div>
</footer>
<div class="bottom">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8"> <center>
              <span class="copyright">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
              
              </span> <a href="" class="pl-2">flampkart.epizy.com</a></center>
             </div>
  </div>
</div>
</div>
</body>
</html>

