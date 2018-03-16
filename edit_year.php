<!DOCTYPE html>
<!--
Template Name: Penyler
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>ACM-SACC Admin Interface</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/form.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/NIT-Calicut.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper">
    <header id="header" class="hoc clear">
      <div id="logo"> 
        <!-- ################################################################################################ -->
        <h1><a href="index.html">National Institute of Technology, Calicut</a></h1>
        <p>ACM - SAC Admin Interface</p>
        <!-- ################################################################################################ -->
      </div>
      <nav id="mainav" class="clear"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li class="active"><a href="home.php">Home</a></li>
          <!--<li><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="pages/gallery.html">Gallery</a></li>
              <li><a href="pages/full-width.html">Full Width</a></li>
              <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
              <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
              <li><a href="pages/basic-grid.html">Basic Grid</a></li>
            </ul>
          </li>-->
          <!--<li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>-->
          <li><a class="drop" href="#">Website</a>
            <ul>
              <li><a href="create.php">Create new</a></li>
              <li><a href="edit_year.php">Edit website</a></li>
            </ul>
          </li>
          <li><a href="update_info.html">Update Information</a></li>
          <li><a href="new_pwd.html">Change Password</a></li>
          <li><a href="#">Add new Admin</a></li>
          <li><a href="#">Log Out</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->

<br>
<?php
$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';


$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());

// define variables and set to empty values
$yearErr= 0;
$year="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["year"])) {
    $yearErr = 1;
  } else {
    $year = test_input($_POST["year"]);
  } 

if($yearErr == 0 )
  {
  header("Location:edit/title.php");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>    

<div class="wrap-contact100" style="color:#222222;">
<br>
<p style="text-align: center;font-size:20px;">Enter the Year</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">


    <div class="wrap-input100 validate-input" data-validate="Name is required">
           <span class="label-input100"><span class="error">*</span><?php if ($yearErr==1){ echo "<span class='error'>Year :</span>";} else{ echo "Year :"; }?></span>
          <input class="input100" type=number name="year" placeholder="Enter Year ...">
          <span class="focus-input100"></span>

    </div>

<div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Edit
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
</form>

<br>
</div>

<?php
mysqli_close($dbConn);
?>


        <!--<div class="inspace-30" style="color: #111111;" style="text-align:center;">
         <form action="#" style="text-align:center;">
             Enter the year to edit :
            <input type=number name="year" style="text-align:center;"></br>
             <input type="submit" value="Edit">
         </form>
        </div>
    -->
    
    <div class="clear"></div>
  </main>
</div>



<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('images/NIT-Calicut.jpg');">
  <footer id="footer" class="hoc clear center"> 
    <!-- ################################################################################################ -->
    
    <!-- ################################################################################################ -->
  </footer>
  <!-- ################################################################################################ -->
  <div id="copyright" class="hoc clear center"> 
    <!-- ################################################################################################ -->
    
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
