<?php require 'session.php';
?>
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
          <li ><a href="home.php">Home</a></li>
          
          <li><a class="drop" href="#">Website</a>
            <ul>
              <li><a href="create.php">Create new</a></li>
              <li><a href="#">Edit website</a></li>
            </ul>
          </li>
          <li ><a href="update_info.php">Update Information</a></li>
          <li><a href="new_pwd.php">Change Password</a></li>
          <li class="active"><a href="new_admin.php">Add new Admin</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
 
</div>
<!-- End Top Background Image Wrapper -->
<?php

$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());
$uid=$_SESSION['uid'];

// define variables and set to empty values
$unameErr = $passErr =0;
$uname = $pass= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $unameErr = 1;
  } else {
    $uname =$_POST["username"];
  }
  
   if (empty($_POST["password"])) {
    $passErr = 1;
  } else {
    $pass=$_POST["password"];
  }
  
  
  
/* inserting into databse*/

if($unameErr == 0 && $passErr == 0 )
{
  $pass=SHA1($pass);
  $sql="INSERT into Admin (username, password) VALUES ('$uname', '$pass')";

  $result = mysqli_query($dbConn, $sql);
  if($result)
  {
      header("Location:home.php");
  }
  else
  {
    echo "Error creating another User";

  }

}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data=ucwords(strtolower($data));
  return $data;
}


?>

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
<div class="wrap-contact100">
     <form class="contact100-form validate-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">

        <div class="wrap-input100 validate-input" data-validate="User Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($unameErr==1){ echo "<span class='error'>User Name :</span>";} else{ echo "User Name :"; }?></span>
          <input class="input100" type="text" name="username" placeholder="Enter New User Name" <?php if ($unameErr==0){ echo "value="."'".$uname."'";} ?> >
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="New Password is required">
          <span class="label-input100" ><span class="error">*</span><?php 
          if ($passErr==1){ echo "<span class='error'>Password :</span>";} else{ echo "Password :"; }?></span>
          <input class="input100" type="password" name="password" placeholder="Enter password for New User">
          <span class="focus-input100"></span>
        </div>
        <div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Update
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>
    </div>

    <!-- ################################################################################################ -->
    <!-- / main body -->


    <div class="clear"></div>
  </main>
</div>

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