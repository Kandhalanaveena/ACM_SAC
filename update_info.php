<?php require 'session.php';
require 'open.php';
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
              <li><a href="edit_year.php">Edit website</a></li>
            </ul>
          </li>
          <li class="active"><a href="update_info.php">Update Information</a></li>
          <li><a href="new_pwd.php">Change Password</a></li>
          <li><a href="new_admin.php">Add new Admin</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </nav>
    </header>
  </div>
 
</div>
<!-- End Top Background Image Wrapper -->
<?php

$uid=$_SESSION['uid'];

// define variables and set to empty values
$unameErr = $fnameErr = $lnameErr= $emailErr= $mobileErr =0;
$uname = $fname =$lname = $email= $mobile ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $unameErr = 1;
  } else {
    $uname =$_POST["username"];
  }
  echo "".$unameErr."<br>";
  echo $uname;
  if (empty($_POST["firstname"])) {
    $fnameErr = 1;
  } else {
    $fname=test_input($_POST["firstname"]);
  }
  
  if (empty($_POST["lastname"])) {
    $lnameErr = 1;
  } else {
    $lname=test_input($_POST["lastname"]);
}
 if (empty($_POST["email"])) {
    $emailErr = 1;
  } else {
   $email=test_input($_POST["email"]);
 }   

if (empty($_POST["mobile"])) {
    $mobileErr = 1;
  } else {
   $mobile=test_input($_POST["mobile"]);
 } 
  
    
  
  
/* inserting into databse*/

if($unameErr == 0 && $fnameErr == 0 && $lnameErr==0 && $emailErr==0 && $mobileErr==0 )
{
  $sql="UPDATE Admin SET fname='".$fname."',lname='".$lname."',email='".$email."',mobile='".$mobile."', username='".$uname."' WHERE uid=".$uid."";

  $result = mysqli_query($dbConn, $sql);
  if($result)
  {
      header("Location:home.php");
  }
  else
  {
    echo "Error Updating Info";

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

if($unameErr==0 && empty($uname))
{

$sql="SELECT * from Admin WHERE uid='$uid'";

$result = mysqli_query($dbConn, $sql);

if($result)
  {
    $row=mysqli_fetch_array($result);
    $uname=$row['username'];
  }
else
{

 echo "No Username<br>";
 echo $uid;
}


}
?>

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
<div class="wrap-contact100">
     <form class="contact100-form validate-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($unameErr==1){ echo "<span class='error'>User Name :</span>";} else{ echo "User Name :"; }?></span>
          <input class="input100" type="text" name="username" placeholder="Enter First name" <?php if ($unameErr==0){ echo "value="."'".$uname."'";} ?> >
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($fnameErr==1){ echo "<span class='error'>First Name  :</span>";} else{ echo "First Name :"; }?></span>
          <input class="input100" type="text" name="firstname" placeholder="Enter First name" <?php if ($fnameErr==0){ echo "value="."'".$fname."'";} ?> >
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($lnameErr==1){ echo "<span class='error'>Last Name :</span>";} else{ echo "Last Name :"; }?></span>
          <input class="input100" type="text" name="lastname" placeholder="Enter Last name" <?php if ($lnameErr==0){ echo "value="."'".$lname."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <span class="label-input100"><span class="error">*</span><?php if ($emailErr==1){ echo "<span class='error'>Email :</span>";} else{ echo "Email :"; }?></span>
          <input class="input100" type="text" name="email" placeholder="Enter email id" <?php if ($emailErr==0){ echo "value="."'".$email."'";} ?> >
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Phone is required">

          <span class="label-input100"><span class="error">*</span><?php if ($mobileErr==1){ echo "<span class='error'>Mobile :</span>";} else{ echo "Mobile :"; }?></span>
          <input class="input100" type="tel" name="mobile" placeholder="Enter mobile number" <?php if ($mobileErr==0){ echo "value="."'".$mobile."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <!--<div class="wrap-input100 validate-input" data-validate = "Message is required">
          <span class="label-input100">Message:</span>
          <textarea class="input100" name="message" placeholder="Your Comment..."></textarea>
          <span class="focus-input100"></span>
        </div>
        -->
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
<?php 
require 'close.php'
?>
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