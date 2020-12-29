
<?php
include_once "assets/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
     <title>Registered shop</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
     <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
     <link rel="stylesheet" href="css\body.css">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
<style>

  
.filterDiv {
  float: left;
  background-color: #2196F3;
  color: #ffffff;
  text-align: center;
  display: none;
}

.show {
  display: block;
}

.container {
  margin: auto;
  padding: 20px;
}

/* Style the buttons */
.btn {

  border: none;
  outline: none;
  border-radius: 25px;
  background-color: #f1f1f1;
  cursor: pointer;
 margin-bottom: 1%;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

</style>


</head>
  <body>

    <!--this line includes header file-->
    <?php include"assets/hd.php"
    ?>
<div class="container">

  <a href="shop.php" class="btn btn-danger" role="button">
  ALL</a>

                      <!--this php code will dynamically add the category from the DB-->
                      <?php

                          $cat ="SELECT * FROM area";
                          $rel= mysqli_query($con,$cat);//stores all categories in $cat variable
                          while ($c = mysqli_fetch_array($rel)): //fetch each row in $c variable
                      ?>

                      <!--this will show a dynamic list group in category section...this category is extracted from category table's cat_title-->
                      <a href="shop.php?cat=<?= $c['area_name'];?>"  class="btn btn-danger" role="button"><?= $c['area_name'];?></a>

                      <?php endwhile;?>
            
            </div>
             <?php
                $e= mysqli_num_rows(mysqli_query($con," SELECT * from vendor where v_status='Active'"));
              ?>
              <br><br>
 <div class="col-100 col-lg-100 col-md-100">
              <div class="row">
               


               <?php

                /*if the user will search by name of product then this if will be executed and filterred data will be shown*/
                  if(isset($_GET['find'])){
                      $search = $_GET['search'];
                      $call = mysqli_query($con,"SELECT * FROM vendor WHERE shop_name LIKE '%$search%' AND v_status='Active'");
                    }

                /*if the user will search category wise then this elseif will be executed and filterred data will be shown*/
                  elseif(isset($_GET['cat'])){
                      $cat = $_GET['cat'];
                      $call = mysqli_query($con,"SELECT * FROM vendor WHERE area_name='$cat' AND v_status='Active' ");
                    }

              /* if the user will directly go to the products page then this else will be executed without filteration*/
                  else{
                      $call = mysqli_query($con,"SELECT * FROM vendor WHERE v_status='Active'");  /*collects all data from product table*/
                    }
                      $count = mysqli_num_rows($call);  /*$count will store the no. of row in product*/
                      if ($count > 0):

                      while($row = mysqli_fetch_array($call)):  /*while loop starts and fetch one-by-one row in $row variable*/
                ?>

           <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
                                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"><!--?action=add&id=<?php echo $row["v_id"]; ?>-->

                            <div style=" padding: 16px;  margin-bottom: 10px; box-shadow: 1px 2px 5px grey; box-align: center;">
                              <center><?php echo $row["shop_Name"]; ?></center>
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
                <center>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> This area is not available shops.</h1>
                      </div>
                  </div></center>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>

   <?php include"assets/footer.php"?>
 </body>
</html>
