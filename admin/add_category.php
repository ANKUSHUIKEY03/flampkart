   
        <?php
session_start();
include"../assets/config.php";
include "include/side.php";
include "include/header.php";
if(isset($_POST['btn_save']))
{
$cat_title=$_POST['cat_title'];
}

mysqli_query($con,"INSERT INTO category (cat_title) VALUES ('$cat_title')") 
      or die ("Query 1 is inncorrect........");

mysqli_close($con);



?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Category</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" placeholder="Category title" name="cat_title" class="form-control" required>
                        </div>
                      </div>
                     
                    </div>
                   
                   
                    
                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update Category</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      

         

