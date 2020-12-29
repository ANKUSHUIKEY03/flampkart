
<?php
session_start(); 
include"../assets/config.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MilkMart | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesoem.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body style="background:#8f8c8c;">
    <?php
        
      

$v_id=$_GET['v_id'];

$result=mysqli_query($con,"SELECT v_id,v_f_name,v_L_name, v_email, v_pass FROM vendor WHERE v_id='$v_id'")or die ("query 1 incorrect.......");

list($v_id,$v_f_name,$v_L_name,$v_email,$v_pass)=mysqli_fetch_array($result);

if(isset($_GET['btn-save'])) 
{
$v_id=$_GET['v_id'];
$v_f_name=$_GET['v_f_name'];
$v_L_name=$_GET['v_L_name'];
$v_email=$_GET['v_email'];
$v_pass=$_GET['v_pass'];

mysqli_query($con,"UPDATE vendor set v_f_name='$v_f_name', v_L_name='$v_L_name', v_email='$v_email', v_pass='$v_pass' where v_id='$v_id'")or die("Query 2 is inncorrect..........");

header("location: index.php");
mysqli_close($con);
}
?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="vendor_profile.php" method="GET" enctype="multipart/form-data">
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE VENDOR
            </h2>
            <input type="hidden" name="v_id" id="user_id" value="<?php echo $v_id;?>" />
   
            <div class="row">
                <div class="form-group col-6">
                
                      <input type="text" class="form-control rounded-pill form-control-lg" name="v_f_name" value="<?php  echo $v_f_name; ?>">

                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_L_name" value="<?php echo 'v_L_name'; ?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">

                  <select class="form-control rounded-pill form-control-lg" name="v_gen">
                      <option value="<?=$row['v_gen']?>" selected disabled hidden><?php 'v_gen';?></option>
                      <option>male</option>
                      <option>female</option>
                      <option>other</option>
                  </select>
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_age" value="<?php echo 'v_age';?>">
                </div>
            </div>

              <div class="row">
                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_email" value="<?php echo 'v_email';?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="v_phn" value="<?php echo 'v_phn';?>">
               </div>
            </div>

            <div class="row">

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="v_add" value="<?php echo 'v_add';?>">
                </div>

                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="v_pin" value="<?php echo 'v_pin';?>">
                </div>
            </div>

            <div class="row">


                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="v_city">
                        <option value=""><?php echo 'v_city';?></option>
                        <option>Purnea</option>
                        <option>Saharsa</option>
                        <option>Katihar</option>
                        <option>Kishanganj</option>
                        <option>Bhagalpur</option>
                    </select>
                </div>

                <div class="form-group col-6">

                    <select class="form-control rounded-pill form-control-lg" name="v_state">
                        <option value=""><?php echo 'v_state'; ?></option>
                        <option>Bihar</option>
                        <option>panjab</option>
                        <option>Delhi</option>
                        <option>Jharkhand</option>
                        <option>Uttar Pradesh</option>
                    </select>
                </div>
            </div>


             <div class="form-group">
               <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>   
                   </div>

          </form>

        </div>
      </div>
    </div>
  </div>



          </body>
</html>
