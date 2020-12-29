 <?php
session_start();
include"../assets/config.php";
include "include/side.php";
include "include/header.php";
if(isset($_POST['btn_save']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$A_password=$_POST['A_password'];
$phone_no=$_POST['phone_no'];
$Address=$_POST['Address'];
$City=$_POST['City'];
$a_img=$POST['a_img'];
mysqli_query($con,"INSERT INTO admin (first_name, last_name,email,A_password,phone_no,Address,City,a_img) VALUES ('$first_name','$last_name','$email','$A_password','$phone_no','$Address','$City','$a_img')") 
			or die ("Query 1 is inncorrect........");
header("location: manage_users.php"); 
mysqli_close($con);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Users</h4>
                  <p class="card-category">Complete User profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" placeholder="First Name" name="first_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" name="last_name" placeholder="Last Name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="password" placeholder="Password" name="A_password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="number" placeholder="Phone" name="phone_no" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="file" name="a_img" class="form-control" >
                        </div>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" name="City" placeholder="City"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"></label>
                          <input type="text" name="Address" Placeholder="Address" class="form-control" required>
                        </div>
                      </div>
                       
                    </div>
                    
                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      