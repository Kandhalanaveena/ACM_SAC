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
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/form.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/NIT-Calicut.jpg');"> 
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
          <li><a href="home.html">Admin</a></li>
          <li><a href="">Title</a></li>
          <li><a class="drop" href="">Home</a>
            <ul>
              <li><a href="host.php">Hosted by</a></li>
              <li><a href="sponsor.php">Sponsored by</a></li>
              <li><a href="imp_dates.php">Important dates</a></li>
              <li><a href="sub_link.php">Submission Link</a></li>
            </ul>
          </li>
          <li ><a href="track_topics.php">Track Topics</a></li>
          <li class="active"><a class="drop" href="">Chair persons</a>
            <ul>
              <li><a href="chairs_exist.php">Add Existing</a></li>
              <li><a href="chairs_new.php">Add New</a></li>
            </ul>
          </li>
          <li ><a href="prog_members.php">Program Committee</a></li>
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
<div class="wrap-contact100" style="color:#222222;">
<br>
<?php
//require 'globals_year.php';
$year=2018;
// define variables and set to empty values
$nameErr = $desErr = $depErr= $insErr= $cityErr = $stateErr = $pinErr= $countryErr = $emailErr= $codeErr= $phoneErr= $faxErr =0;
$name = $des =$dep = $ins= $city = $state= $pin= $country = $email =$code = $phone  = $fax ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = 1;
  } else {
    $name = test_input($_POST["name"]);
  }
  
  
    

  $des=test_input($_POST["des"]);
  $dep=test_input($_POST["dep"]);
  $ins=test_input($_POST["ins"]);
  $city=test_input($_POST["city"]);
  $state=test_input($_POST["state"]);
  $pin=$_POST["pin"];
  $country=test_input($_POST["country"]);
  $email = $_POST["email"];
  $code=$_POST["code"];
  $phone=$_POST["phone"];
  $fax=$_POST["fax"];

/* inserting into databse*/

if($nameErr == 0 && $emailErr == 0)
{
$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';


$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());

$sql="INSERT into Chairs (cname, designation, department, institute, city, state, pin, country, email, country_code, phone, fax) 
VALUES ('$name','$des', '$dep','$ins', '$city', '$state', '$pin','$country', '$email',  '$code', '$phone', '$fax')";


$result = mysqli_query($dbConn, $sql);

$sql="INSERT into Chairs_Year (cid, year) 
    SELECT cid, "."'".$year."'"." FROM Chairs WHERE cname='$name'";

$result = mysqli_query($dbConn, $sql);


if($result)
{
  header("Location:chairs_new.php");
}

mysqli_close($dbConn);

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
    <p style="text-align: center;font-size:20px;">Member details</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">


<div class="wrap-input100 validate-input" data-validate="Name is required">
           <span class="label-input100"><span class="error">*</span><?php if ($nameErr==1){ echo "<span class='error'>Name:</span>";} else{ echo "Name:"; }?></span>
          <input class="input100" type="text" name="name" placeholder="Enter Name" <?php if ($nameErr==0){ echo "value="."'".$name."'";} ?> >
          <span class="focus-input100"></span>

        </div>
        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Designation:</span>
          <input class="input100" type="text" name="des" placeholder="Enter Designation" <?php if ($desErr==0){ echo "value="."'".$des."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Department:</span>
          <input class="input100" type="text" name="dep" placeholder="Enter Department" <?php if ($depErr==0){ echo "value="."'".$dep."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Institute:</span>
          <input class="input100" type="text" name="ins" placeholder="Enter Institute" <?php if ($insErr==0){ echo "value="."'".$ins."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        

         <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   City:</span>
          <input class="input100" type="text" name="city" placeholder="Enter City" <?php if ($cityErr==0){ echo "value="."'".$city."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   State:</span>
          <input class="input100" type="text" name="state" placeholder="Enter State" <?php if ($stateErr==0){ echo "value="."'".$state."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Pincode:</span>
          <input class="input100" type="text" name="pin" placeholder="Enter Pincode" <?php if ($pinErr==0){ echo "value="."'".$pin."'";} ?>>
          <span class="focus-input100"></span>
        </div>
      
      

         <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Country:</span>
          <input class="input100" type="text" name="country" placeholder="Enter Country" <?php if ($countryErr==0){ echo "value="."'".$country."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Email:</span>
          <input class="input100" type="text" name="email" placeholder="Enter Email" <?php if ($emailErr==0){ echo "value="."'".$email."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Country code:</span>
          <input class="input100" type="text" name="code" placeholder="Enter Country code" <?php if ($codeErr==0){ echo "value="."'".$code."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Phone:</span>
          <input class="input100" type="text" name="phone" placeholder="Enter Phone number" <?php if ($phoneErr==0){ echo "value="."'".$phone."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   Fax:</span>
          <input class="input100" type="text" name="fax" placeholder="Enter Fax" <?php if ($faxErr==0){ echo "value="."'".$fax."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        

<div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Add
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>


<br>
<br>
</div>


<!--Showing the List of track topics-->







    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('../images/NIT-Calicut.jpg');">
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
