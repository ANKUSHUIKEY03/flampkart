
    <?php
session_start();
include"../assets/config.php";
include "include/side.php";
include "include/header.php";

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$cat_id=$_GET['cat_id'];

/*this is delet quer*/
mysqli_query($con,"DELETE FROM category WHERE cat_id='$cat_id'")or die("query is incorrect...");
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Manage Category</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>Category Title</th>
	<th><a href="add_category.php" class="btn btn-success">Add New Category</a></th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"SELECT cat_id,cat_title from category")or die ("query 2 incorrect.......");

                        while(list($cat_id,$cat_title)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$cat_title</td>";

                        echo"<td>
                        <a href='editcategory.php?cat_id=$cat_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit category'>
                                <i class='material-icons'>edit</i>
                              <div class='ripple-container'></div></a>
                        <a href='managecategory.php?cat_id=$cat_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete category'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
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
     