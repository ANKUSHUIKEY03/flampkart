
<?php 
include_once"config.php";
session_start();

if(!isset($_SESSION['vendor'])):
  header("location: ../login_v.php");
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Products</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
   
</head>
    <body>
        <?php include"hd.php"?>
<br><br>
  <div class="content">
        <div class="container-fluid" >
          <form action="insertProduct.php" method="POST" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title"><b style="color: black">Add Product</b></h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" required name="p_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="p_price" required class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Add Image</label>
                        <input type="file" name="p_img" required class="form-control rounded-pill form-control-lg" id="picture" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="p_desc" class="form-control"></textarea>
                      </div>
                    </div>
                  
                  </div>
                </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title"><b style="color: black">Categories</b></h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <!--this is a dynamic select tag where the option for category is depend on the categories available ib database-->
                                    <select name="p_cat_title" class="form-control">
                                         <?php
                                         /*this $cat variable will store all the  product categories available in DB*/
                                            $cat = mysqli_query($con,"SELECT * FROM category");

                                            /*this while loop will fetch all the selected row in option tag one-by-one*/
                                            while ($c = mysqli_fetch_array($cat)):
                                          ?>
                                          <option><?= $c['cat_title'];?></option>

                                          <?php endwhile;?>
                                    </select>
                        
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <input type="text" id="brand" name="p_brand" required class="form-control">
                      </div>
                    </div>
                      </div>
              <div class="form-group">
                  <button type="submit" id="btn_save" name="send" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
    </form>
  </div>
</div>
     <br><br>
        <?php include"footer.php"?>
    </body>
</html>

<?php
if(isset($_POST['send'])){    /*when vendor will press submit button by filling the form records then the all data  will be stored in DB */


    $_SESSION['vendor']=$log;
    $p_name = $_POST['p_name'];   /*stores product name*/
    $p_price =$_POST['p_price'];
    $each_qty=$_POST['each_qty'];
    $p_cat_title = $_POST['p_cat_title'];
    $p_mfg = $_POST['p_mfg'];
    $p_desc = $_POST['p_desc'];
    $qty = $_POST['p_qty'];
    $p_brand = $_POST['p_brand'];

    $p_img = $_FILES['p_img']['name'];  // this is for storing the image in a variable
    $p_img_tmp =  $_FILES['p_img']['tmp_name'];  //this is for temporarily store the the image.it helps  untill image is getting uploaded

    move_uploaded_file($p_img_tmp,"../image/$p_img"); //when image is uploaded then it will be stored in image folder we have used


    //the below section is for sql query to insert the all variable values in the corrospondence field of product table
    $query = mysqli_query($con,"INSERT INTO product (p_name,p_brand,p_price,each_qty,p_mfg,p_img,cat_title,p_desc,Qty,v_email) value ('$p_name','$p_brand','$p_price','$each_qty','$p_mfg','$p_img','$p_cat_title','$p_desc','$qty','$log')");
echo"<script>window.open('index.php','_self')</script>";
}


?>
</body>

    </html>
    

