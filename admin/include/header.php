
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.dropbtn {
  background-color: purple;
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;

}

.dropbtn:hover, .dropbtn:focus {
  background-color: #333333;
  color: white;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #423342;
  width: 250px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: purple;
color: white;}

.show {display: block;}
</style>
</head>


     <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Admin</a>
              <?php
        if(isset($_SESSION['admin'])):
          $log = $_SESSION['admin'];
          $query = mysqli_query($con,"SELECT * FROM admin where email='$log'");
          $row = mysqli_fetch_array($query);

        ?>
          </div>
        
          <div class="dropdown"  >
  <button onclick="myFunction()" class="dropbtn" style="padding: 16px;"><i class="fa fa-bars"></i>
</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="index.php">Home</a>
    <a href="adduser.php">Add User</a>
    <a href="manageuser.php">Manage User</a>
    <a href="managearea.php">Add Area</a>
    <a href="managecategory.php">Add Category</a>
    <a href="manageshop.php">Registred Shop </a>
     <a href="managecustomer.php">Registred Customer</a>
      <a href="ffedback.php">User Feedback</a>
       <a href="logout.php">Logout</a>
  </div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</div>  <?php endif; ?>  
      </nav>
      