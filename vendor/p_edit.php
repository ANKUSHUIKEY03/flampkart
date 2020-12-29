

<?php include"config.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body>
    <?php
        $edit= $_GET['edit'];
        $query = mysqli_query($con,"SELECT * FROM product where p_id='$edit'");
        $row=mysqli_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="p_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE PRODUCT
            </h2>
            <div class="row">
                <div class="form-group col-6">
                       <h6>Product Name :</h6>
                      <input type="text" class="form-control rounded-pill form-control-lg" name="p_name" value="<?=$row['p_name']?>">
                </div>

                <div class="form-group col-6">
                                            <h6>Product Price :</h6>
                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_price" value="<?=$row['p_price']?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                                         <h6>Product Manufacturing date :</h6>
                  <input type="text" class="form-control rounded-pill form-control-lg" name="p_mfg" value="<?=$row['p_mfg']?>">
                </div>

                <div class="form-group col-6">
                                                            <h6>Product Category :</h6>
                                                        <select name="p_cat_title" class="form-control rounded-pill form-control-lg">
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

              <div class="row">
                <div class="form-group col-6">
                       <h6>Product Quantity :</h6>
                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_qty" value="<?=$row['p_qty']?>">
                </div>

                <div class="form-group col-6">
                                             <h6>Product Brand :</h6>
                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_brand" value="<?=$row['p_brand']?>">
               </div>
            </div>

             <div class="form-group">
                 <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="update" value="UPDATE" class="mt-5">
             </div>

          </form>

        </div>
      </div>
    </div>
  </div>



  <?php
    if(isset($_POST['update'])){
      $p_id=$_GET['edit'];
      $p_name=$_POST['p_name'];
      $p_price=$_POST['p_price'];
      $p_mfg=$_POST['p_mfg'];
      $cat_title=$_POST['cat_title'];
      $p_qty=$_POST['p_qty'];
      $p_brand=$_POST['p_brand'];



      $update="UPDATE product
      set
      p_name='$p_name',p_price='$p_price',p_mfg='$p_mfg',cat_title='$cat_title',p_qty='$p_qty',p_brand='$p_brand' where p_id='$p_id'";
      mysqli_query($con,$update);
      redirect('v_products');
            }
             ?>




  </body>
</html>
