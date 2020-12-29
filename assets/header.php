 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
 .navbar{
    background: white;
    height: 60px;
    width: 1700px;
     box-shadow: 0px 1px 3px grey;
}
.navbar a{
  color: red;
}
.navbar a:hover{
  background-color: white;
  color: green ;
  text-transform: uppercase;
  text-decoration: underline;
}
    

   
  </style>
<nav class="navbar navbar-expand-lg sticky-top" class="navbar">
  <!--used for brand image-->
    <div class="navbar-header" style="width:40%">
        <img src="image\logo10.png" alt=""  style="font-family: 'Modak', cursive; width: 160px;height: 60px" > 
    </div>

   

        <!--used for search bar-->

        <!--used for search bar-->

        <form action="product.php"  method="get" class="form-inline" >
            <input type="search" placeholder="Search Products"  required oninvalid="this.setCustomValidity('You are trying for empty search please enter the valid value')" oninput="this.setCustomValidity('')"  class="form-control" size="40" name="search" style="background:white; transition: width 0.4s line;height: 30px;margin: auto;"  value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
                <input type="submit" value="Go"  name="find"  style="background-color: darkblue; color: white">

</div>
        </form>
 <!--used for navigation bar items-->


        <ul class="navbar-nav ml-auto">

          <?php


          if(!isset($_SESSION['customer'])):
          ?>


                    <li class="nav-item">
                      <a href="signup.php" class="nav-link text-black" class="item">Customer</a>
                    </li>
                       <li class="nav-item">
                      <a href="v_signup.php" class="nav-link text-black" class="item">Vendor</a>
                    </li>
                    

                   
                     <?php else:
          $log = $_SESSION['customer'];
          $calling = mysqli_query($con,"SELECT * from customer where c_email='$log'");
          $data = mysqli_fetch_array($calling);
          $cart_query=mysqli_query($con,"SELECT * FROM cart
            INNER JOIN customer
            ON cart.c_id=customer.c_id
            INNER JOIN product
              ON cart.p_id=product.p_id
            INNER JOIN vendor
            ON cart.v_email=vendor.v_email
            WHERE cart.c_id='".$data['c_id']."' ORDER BY cart.cart_id desc");
            $n=mysqli_num_rows($cart_query);

          $query = mysqli_query($con,"SELECT * FROM customer where c_email='$log'");
          $row = mysqli_fetch_array($query);

            ?>

 <li class="nav-item ">
  <a class="nav-link text-black" href="#" class="item">
         <img src= "image/<?= $row['c_img']; ?>" width="20px" class="mr-2 rounded-circle"><?= $row['c_f_name'];?></a>
       </li>
<?php endif; ?>

                  <li class="nav-item ">
                    <a class="nav-link text-black" href="index.php" class="item">Home</a>
                  </li>
                   <li class="nav-item ">
                    <a class="nav-link text-black" href="shop.php" class="item ">Shops</a>
                  </li>

                  
                  <li class="nav-item">
                      <a href="product.php" class="nav-link text-black"  class="item">Products</a>
                  </li>
                  <?PHP
                    if(isset($_SESSION['customer'])):
                  ?>
                  <li class="Cart.php">
                      <div class="">

                      </div>
                      <a  href="MyCart.php" class="btn btn-link text-black "><i class="fa" style="font-size:24px;">&#xf07a;</i><span style="border-radius:15px; position:relative;top:-16px;left:-10%;background:#222f3e;" class='badge badge-info'><?php echo $n; ?></span></a>
                  </li>
                  <li class="nav-item">
                      <a href="logout.php" class="nav-link text-black"  class="item">Logout</a>
                  </li>
                  <?PHP
                endif;
                  ?>
        </ul>
      </div>
</nav>


                <!--  this section is for creating a signup way Modal -->
                <div id="signupModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title">How do you want to sign up?</h4><hr>
                </div>
                <div class="modal-body">
                <a href="register_vendor_account.php"><div class="btn btn-warning ml-5  mb-2 rounded-pill form-control-lg">As a Vendor</div></a> <br>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

                </div>
                </div>


                <!--  this section is for creating a login way for vendor and employee Modal -->
                <div id="LoginModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title">How do you want to Login?</h4><hr>
                </div>
                <div class="modal-body">
                <a href="vendor_login.php"><div class="btn btn-warning ml-5  mb-2 rounded-pill form-control-lg">As a Vendor</div></a> <br>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

                </div>
                </div>




             <!--  this section is for creating a cart Modal -->
              <!--     <div id="cartModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content
                <div class="modal-content">
                <div class="modal-header">

                <h4 class="modal-title">your cart at a glance</h4><hr>
                </div>
                <div class="modal-body" id="cartModalBody">

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

                </div>
                </div>-->
