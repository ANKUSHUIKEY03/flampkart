<?php
include_once "assets/config.php";
session_start();

if(isset($_POST["add_to_cart"]))
{
          $p_id=$_POST['p_id'];
          $qty=$_POST['quantity'];
          $c_id=$_POST['c_id'];
          $v_email=$_POST['v_email'];
          $duplicate=mysqli_query($con,"SELECT * FROM cart WHERE p_id='$p_id' AND c_id='$c_id'");
             if(mysqli_num_rows($duplicate)==0){
               $insert = mysqli_query($con,"INSERT INTO cart (c_id,p_id,v_email,qty) VALUES ('$c_id','$p_id','$v_email','$qty')");
                }

                else{
                  echo '<script>alert("Item Already Added")</script>';
                }
                header("Location: {$_SERVER["HTTP_REFERER"]}");

              }
?>
<script></script>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
     <title>Products</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
     <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
     <link rel="stylesheet" href="css\body.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<style>
  .product{
    width: 300px;
    height: 470px;
    background-color:#fff;
     border-radius:2px;
     box-shadow: 1px 5px 6px grey;
     text-align: center;
     text-decoration: bold;
     text-transform: capitalize;
     cursor: pointer;
     transition:transform 2s;
}
.product:hover {
  box-shadow: 1px 1px 7px #ff0000;
}
.flip-card {
  background-color: transparent;
  width: 300px;
  height: 390px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

.flip-card-front:hover {
  box-shadow: 1px 1px 7px grey;
}

.flip-card-back:hover {
  box-shadow: 1px 1px 7px grey;
}
button{
  width: 300px;
  box-sizing: border-box;
  transition: all 500ms ease;
  background-color: crimson;
  color: white;
  border: none;
  text-decoration: bold;
  
}
button:hover{
   background-color: yellow;
   color: black;
   text-decoration: bold;
   box-shadow: 1px 1px 7px crimson;
}
h6:hover{
   background-color: white;
   color: #ff0000;
   text-decoration: underline;
}

</style>
</head>
  <body>
  <?php include"assets/hd.php"
    ?>
    <!--this line includes header file-->
   <div class="container-fluid" style="margin-top:80px">
 <div class="row">
              <div class="col-4 col-lg-2 col-md-2  mt-4">

                <!-- this div is used for create a list group-->
                <div class="list-group shadow" style="padding:0px">
                      <a  href="product.php" class="list-group-item list-group-item-action active text-white">CATEGORY</a>

                      <!--this php code will dynamically add the category from the DB-->
                      <?php

                          $cat ="SELECT * FROM category";
                          $rel= mysqli_query($con,$cat);//stores all categories in $cat variable
                          while ($c = mysqli_fetch_array($rel)): //fetch each row in $c variable
                      ?>

                      <!--this will show a dynamic list group in category section...this category is extracted from category table's cat_title-->
                      <a href="product.php?cat=<?= $c['cat_title'];?>" class="list-group-item list-group-item-action"><?= $c['cat_title'];?></a>

                      <?php endwhile;?>
                </div>
            </div>
              <?php
                $e= mysqli_num_rows(mysqli_query($con," SELECT * from product where p_status='Available'"));
              ?>

            <!--this section is for product container-->
            <div class="col-8 col-lg-10 col-md-10">
              <div class="row">
                <div class="col-12" style="text-align:center;">
                  <b> <h3 class="btn btn-primary"  id="info">Our Products (<?=$e?>) </h3><hr></b>
                </div>

                <!--the below section is used for adding the prodects dynamically from DB-->
                <?php

                /*if the user will search by name of product then this if will be executed and filterred data will be shown*/
                  if(isset($_GET['find'])){
                      $search = $_GET['search'];
                      $call = mysqli_query($con,"SELECT * FROM product WHERE p_name LIKE '%$search%' AND p_status='Available'");
                    }

                /*if the user will search category wise then this elseif will be executed and filterred data will be shown*/
                  elseif(isset($_GET['cat'])){
                      $cat = $_GET['cat'];
                      $call = mysqli_query($con,"SELECT * FROM product WHERE cat_title='$cat' AND p_status='Available' ");
                    }

              /* if the user will directly go to the products page then this else will be executed without filteration*/
                  else{
                      $call = mysqli_query($con,"SELECT * FROM product WHERE p_status='Available'");  /*collects all data from product table*/
                    }
                      $count = mysqli_num_rows($call);  /*$count will store the no. of row in product*/
                      if ($count > 0):

                      while($row = mysqli_fetch_array($call)):  /*while loop starts and fetch one-by-one row in $row variable*/
                ?>

                <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
                                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"><!--?action=add&id=<?php echo $row["p_id"]; ?>-->
                                  <div class="container-fluid">
                            <div class="product">
                            <a href="item.php?p_id=<?= $row['p_id'];?>">
                              <div class="flip-card">
                                   <div class="flip-card-inner">
                                        <div class="flip-card-front">
                        <img src="image\<?= $row['p_img'];?>" alt="" style="height: 390px;width: 300px">    </div>
                                        <div class="flip-card-back">
                        <img src="image\<?= $row['p_img'];?>" alt="" style="height: 390px;width: 300px">
                                         </div>
                                   </div>
                                </div>
                              </a>
<h6 ><?php echo $row["p_name"]; ?></h6>
<h6 >₹ <?php echo $row["p_price"]; ?>/-</h6>
</div>

                              <?php
                                if(isset($_SESSION['customer'])):
                                  $log=$_SESSION['customer'];


                                  $cust = mysqli_query($con,"SELECT * FROM customer WHERE c_email='$log'");
                                  $cust_row = mysqli_fetch_array($cust);
                                  $c_id=$cust_row['c_id'];
                              ?>


                                                          <input type="hidden" min="1" max="10" type="number" name="quantity"  value="1" class="form-control text-center" />

                                                          <input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
                                                          <input type="hidden" name="v_email" value="<?php echo $row['v_email'];?>">
                                                          <input type="hidden" name="c_id" value="<?php echo $c_id;?>">

                                                            <input type="hidden" name="hidden_image" value="<?php echo $row["p_img"]; ?>" />

                                                          <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>" />

                                                          <input type="hidden" name="hidden_price" value="<?php echo $row["p_price"]; ?>" />

                                                          <button type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />Add to Cart</button>

<?php endif?>

                          </div>
                        </form>
                </div>

                <?php endwhile;

              else:  /*if no product is available related to search the this else will be executed*/
                ?>
                  <div class='card'>
                      <div class='card-body' style="margin: auto">
                        <h1> Product is not available</h1>
                      </div>
                  </div>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>
<br><br><br><br><br><br>
   <?php include"assets/footer.php"?>
 </body>
</html>
