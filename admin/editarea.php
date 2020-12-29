    
    <?php
session_start();
include"../assets/config.php";
include "include/side.php";
include "include/header.php";

$id=$_REQUEST['id'];

$result=mysqli_query($con,"SELECT id,area_name from area where id='$id'")or die ("query 1 incorrect.......");

list($id,$area_name)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$area_name=$_POST['area_name'];

mysqli_query($con,"UPDATE area set area_name='$area_name' where id='$id'")or die("Query 2 is inncorrect..........");

header("location: managearea.php");
mysqli_close($con);
}
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Area</h5>
              </div>
              <form action="editarea.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="id" id="user_id" value="<?php echo $id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Area name</label>
                        <input type="text" id="area_name" name="area_name"  class="form-control" value="<?php echo $area_name; ?>" >
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
      