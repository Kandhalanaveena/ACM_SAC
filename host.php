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
          <li><a href="home.html">Admin</a></li>
          <li ><a href="title.php">Title</a></li>
          <li class=" active"><a class="drop" href="">Home</a>
            <ul>
              <li><a href="">Hosted by</a></li>
              <li><a href="sponsor.php">Sponsored by</a></li>
              <li><a href="sponsor.php">Important dates</a></li>
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
// define variables and set to empty values
$uniErr = $countryErr = $urlErr= 0;
$uni = $country = $url= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["uni"])) {
    $uniErr = 1;
  } else {
    $uni = test_input($_POST["uni"]);
  }
 

  if (empty($_POST["country"])) {
    $countryErr = 1;
  } else {
    $country = test_input($_POST["country"]);
  }
  
  $url=$_POST["url"];
/* inserting into databse*/

if($uniErr == 0 && $countryErr == 0 )
{
$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';
$year=2018;
$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());

$sql="INSERT into Hosted_by (university_name, country, url, year) 
VALUES ('$uni', '$country', '$url', '$year')";

$result = mysqli_query($dbConn, $sql);
if($result)
{
  //echo "success";
  header("Location:host.php");
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
    <p style="text-align: center;font-size:20px;">Hosting University details</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">


    <div class="wrap-input100 validate-input" data-validate="Name is required">
           <span class="label-input100"><span class="error">*</span><?php if ($uniErr==1){ echo "<span class='error'>University:</span>";} else{ echo "University:"; }?></span>
          <input class="input100" type="text" name="uni" placeholder="Enter University" <?php if ($uniErr==0){ echo "value="."'".$uni."'";} ?> >
          <span class="focus-input100"></span>

        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($countryErr==1){ echo "<span class='error'>Country:</span>";} else{ echo "Country:"; }?></span>
          <input class="input100" type="text" name="country" placeholder="Enter Country" <?php if ($countryErr==0){ echo "value="."'".$country."'";} ?>>
          <span class="focus-input100"></span>
        </div>

         <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   URL:</span>
          <input class="input100" type="text" name="url" placeholder="Enter Website URL" <?php if ($urlErr==0){ echo "value="."'".$url."'";} ?>>
          <span class="focus-input100"></span>
        </div>

<div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Include
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>

<?php
$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';
$year=2018;
$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());

$sql = "SELECT university_name, country FROM Hosted_by WHERE year='$year'";
$result = mysqli_query($dbConn, $sql);
if(mysqli_num_rows($result)>0) 
{
  echo "<p style='text-align: center; font-size:18px;'>Hosting Universities for ". $year."</p>";
}
echo "<ul style='margin-left:20px;'>";
while ($row = mysqli_fetch_array($result)) {

    echo "<li style='padding-left:10px;margin-bottom:4px;'>".$row['university_name']." , ".$row['country']."</li>";
    }
echo "</ul>";
mysqli_close($dbConn);
?>


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
<div class="bgded overlay" style="background-image:url('images/NIT-Calicut.jpg');">
  <footer id="footer" class="hoc clear center"> 
    <!-- ################################################################################################ -->
    <h3 class="heading uppercase">Penyler</h3>
    <ul class="faico clear">
      <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
      <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
      <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
      <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
      <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
    </ul>
    <!-- ################################################################################################ -->
  </footer>
  <!-- ################################################################################################ -->
  <div id="copyright" class="hoc clear center"> 
    <!-- ################################################################################################ -->
    <p>Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
   
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