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
          <li class="active"><a href="">Title</a></li>
          <li><a class="drop" href="">Home</a>
            <ul>
              <li><a href="host.php">Hosted by</a></li>
              <li><a href="sponsor.php">Sponsored by</a></li>
              <li><a href="imp_dates.php">Important dates</a></li>
              <li><a href="sub_link.php">Submission Link</a></li>
            </ul>
          </li>
          <li ><a href="track_topics.php">Track Topics</a></li>
         <li ><a class="drop" href="">Chair persons</a>
            <ul>
              <li><a href="chairs_exist.php">Add Existing</a></li>
              <li><a href="chairs_new.php">Add New</a></li>
            </ul>
          </li>
          <li ><a href="prog_members.php">Program Committee</a></li>
          <li ><a class="drop" href="">Paragraphs</a>
            <ul>
              <li><a href="para_home.php">Introduction</a></li>
              <li><a href="para_proceedings.php">Proceedings</a></li>
              <li><a href="para_submission.php">Paper Submission</a></li>
              <li><a href="para_topics.php">Track topics</a></li>
            </ul>
          </li>
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
//require 'globals_temp.php';

$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';
$year='2018';
$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());

// define variables and set to empty values
$numberErr = $cityErr = $countryErr = $startdateErr= $enddateErr= $gurlErr =0;
$number = $city = $country = $startdate =$enddate  = $gurl ="";


// updating database

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["number"])) {
    $numberErr = 1;
  } else {
    $number = test_input($_POST["number"]);
  }
    
  if (empty($_POST["city"])) {
    $cityErr = 1;
  } else {
    $city = test_input($_POST["city"]);
  }

  if (empty($_POST["country"])) {
    $countryErr = 1;
  } else {
    $country = test_input($_POST["country"]);
  }

  if (empty($_POST["startdate"])) {
    $startdateErr = 1;
  } else {
    $startdate = $_POST["startdate"];
  }
  if (empty($_POST["enddate"])) {
    $enddateErr = 1;
  } else {
    $enddate = $_POST["enddate"];
  }
  if (empty($_POST["gurl"])) {
    $gurlErr = 1;
  } else {
    $gurl = $_POST["gurl"];
  }


if( $numberErr == 0 && $cityErr == 0 && $countryErr == 0 && $startdateErr== 0 && $enddateErr== 0 && $gurlErr == 0 )
  {
$sql = "UPDATE Info SET number='$number', city = '$city', country = '$country', start_date = '$startdate', end_date = '$enddate', url = '$gurl'
WHERE year='$year'";


$result = mysqli_query($dbConn, $sql);


  }   
}



$year=2018;
$sql="SELECT * from Info WHERE year='$year'";
$result = mysqli_query($dbConn, $sql);

if($result)
  {
    $row=mysqli_fetch_array($result);
    
    if($numberErr==0 && empty($number))
    {
      $number=$row['number'];
    }
    if($cityErr==0 && empty($city))
    {
      $city=$row['city'];
    }
    if($countryErr==0 && empty($country))
    {
      $country=$row['country'];
    }
    if($startdateErr==0 && empty($startdate))
    {
      $startdate=$row['start_date'];
    }
    if($enddateErr==0 && empty($enddate))
    {
      $enddate=$row['end_date'];
    }
    if($gurlErr==0 && empty($gurl))
    {
      $gurl=$row['url'];
    }

  }

/* taking from databse*/
/*
if($yearErr == 0 && $numberErr == 0 && $cityErr == 0 && $countryErr == 0 && $startdateErr== 0 && $enddateErr== 0 && $gurlErr == 0 )
{



   
    $sql="SELECT * from Info WHERE year='2018'";

  $result = mysqli_query($dbConn, $sql); 
  
  $topicrow=mysqli_fetch_array($result);
  $edit_number=$topicrow['number'];
  $edit_city=$topicrow['city'];
  $edit_country=$topicrow['country'];
  $edit_startdate=$topicrow['start_date'];
  $edit_enddate=$topicrow['end_date'];
  $edit_url=$topicrow['url'];
  

mysqli_close($dbConn);

}
*/

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data=ucwords(strtolower($data));
  return $data;
}

?>
    <p style="text-align: center;font-size:20px;">Title details</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">




        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($numberErr==1){ echo "<span class='error'>Number:</span>";} else{ echo "Number:"; }?></span>
          <input class="input100" type="text" name="number" placeholder="Enter Number" <?php if ($numberErr==0){ echo "value="."'".$number."'";} ?>>
          <span class="focus-input100"></span>
        </div>

         <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($cityErr==1){ echo "<span class='error'>City:</span>";} else{ echo "City:"; }?></span>
          <input class="input100" type="text" name="city" placeholder="Enter City" <?php if ($cityErr==0){ echo "value="."'".$city."'";} ?>>
          <span class="focus-input100"></span>
        </div>

         <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($countryErr==1){ echo "<span class='error'>Country:</span>";} else{ echo "Country:"; }?></span>
          <input class="input100" type="text" name="country" placeholder="Enter Country" <?php if ($countryErr==0){ echo "value="."'".$country."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($startdateErr==1){ echo "<span class='error'>Start date:</span>";} else{ echo "Start date:"; }?></span>
          <input class="input100" type="date" name="startdate" placeholder="Enter Start date" <?php if ($startdateErr==0){ echo "value="."'".$startdate."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($enddateErr==1){ echo "<span class='error'>End date:</span>";} else{ echo "End date:"; }?></span>
          <input class="input100" type="date" name="enddate" placeholder="Enter End date" <?php if ($enddateErr==0){ echo "value="."'".$enddate."'";} ?>>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($gurlErr==1){ echo "<span class='error'>Global URL:</span>";} else{ echo "Global URL:"; }?></span>
          <input class="input100" type="url" name="gurl" placeholder="Enter Global URL" <?php if ($gurlErr==0){ echo "value="."'".$gurl."'";} ?>>
          <span class="focus-input100"></span>
        </div>
       <!--<input type='submit' name="button1" value="update" > -->


<div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Update
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>


<br>
<br>
</div>



<!--Showing the List of track topics-->



<?php
mysqli_close($dbConn);

?>




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
