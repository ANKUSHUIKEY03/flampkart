
    <?php
session_start();
include"../assets/config.php";
include "include/side.php";
include "include/header.php";

$id=$_REQUEST['id'];

$result=mysqli_query($con,"SELECT id,first_name,last_name,phone_no, email, A_password from admin where id='$id'")or die ("query 1 incorrect.......");

list($id,$first_name,$last_name,$email,$phone_no,$A_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$A_password=$_POST['A_password'];
$phone_no=$_POST['phone_no'];

mysqli_query($con,"UPDATE admin set first_name='$first_name', last_name='$last_name', email='$email',phone_no='$phone_no', A_password='$A_password' where id='$id'")or die("Query 2 is inncorrect..........");

header("location: manageuser.php");
mysqli_close($con);
}
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit User</h5>
              </div>
              <form action="edituser.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="id" id="user_id" value="<?php echo $id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>First name</label>
                        <input type="text" id="first_name" name="first_name"  class="form-control" value="<?php echo $first_name; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Last name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $last_name; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email"  id="email" name="email" class="form-control" value="<?php echo $email; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Phone No.</label>
                        <input type="number" name="phone_no" id="phone_no" class="form-control" value="<?php echo $phone_no; ?>">
                      </div>
                    </div>
                  
                  
                  
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Password</label>
                        <input type="text" name="A_password" id="password" class="form-control" value="<?php echo $A_password; ?>">
                      </div>
                    </div>
                  
                  
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>              </div>
              </form>    

            </div>
          </div>
         
          
        </div>
      </div>
      