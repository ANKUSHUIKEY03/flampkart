
    <?php
session_start();
include"../assets/config.php";
include "include/side.php";
include "include/header.php";

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$v_id=$_GET['v_id'];

/*this is delet quer*/
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Registered Shops</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>Shop Name</th>
                <th>Vendor Name</th>
                <th>Contact</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"SELECT v_id, shop_Name, v_phn,v_f_name,v_L_name from vendor")or die ("query 2 incorrect.......");

                        while(list($v_id,$shop_Name,$v_phn,$v_f_name,$v_L_name)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$shop_Name</td><td>$v_f_name
                      $v_L_name</td><td>$v_phn</td></tr>";
                        
                        }
                        mysqli_close($con);
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
     <?php include "managecustomer.php";?>
    