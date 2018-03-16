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
          <li class="active"><a class="drop" href="">Home</a>
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
          <li><a class="drop" href="">Paragraphs</a>
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

$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';
$year=2018;


$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());

$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if($_POST["button1"]=="Edit")
  {
    
    $sponsor_name=$_POST["sponsor_name"];
    $url=$_POST["url"];
    //echo "year";
    //echo $acid;
    $flag=1;
    $sql="SELECT * from Sponsored_by WHERE sponsor_name='$sponsor_name' and year='$year'";

  $result = mysqli_query($dbConn, $sql); 
  
  $topicrow=mysqli_fetch_array($result);
  $edit_sponsorname=$topicrow['sponsor_name'];
  $edit_url=$topicrow['url'];
 $sql="DELETE from Sponsored_by WHERE sponsor_name='$sponsor_name' and year='$year'";

  $result = mysqli_query($dbConn, $sql); 
  

}

else if($_POST["button1"]=="Delete")
  {
     $sponsor_name=$_POST["sponsor_name"];
   
    //echo "year";
    //echo $dcid;
    $flag=2;
    $sql="DELETE FROM Sponsored_by WHERE sponsor_name='$sponsor_name' and year='$year'";
  $result = mysqli_query($dbConn, $sql); 
  if($result)
  {
    //echo "success";
  }
  else
  {
    //echo "failure";
  }

}
}
?>
<?php
//require 'globals_year.php';

//define variables and set to empty values
$sponsorErr= $urlErr= 0;
$sponsor= $url= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["sponsor"])) {
    $sponsorErr = 1;
  } else {
    $sponsor = test_input($_POST["sponsor"]);
  }
 

  $url=$_POST["url"];


  

if($sponsorErr == 0 )
{
$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';


$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());
if($flag==0)
{
$sql="INSERT into Sponsored_by (sponsor_name, url, year) 
VALUES ('$sponsor', '$url', '$year')";


$result = mysqli_query($dbConn, $sql);

if($result)
{
  //header("Location:sponsor.php");
}

mysqli_close($dbConn);
}

else if($flag==1)
{
$sql="UPDATE Sponsored_by
SET sponsor_name='$edit_sponsorname', url='$edit_url'
WHERE sponsor= '$sponsor' AND year='$year';";

$result = mysqli_query($dbConn, $sql);

if($result)
{
  //header("Location:sponsor.php");
}

mysqli_close($dbConn);
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


<p style="text-align: center;font-size:20px;">Sponsors details</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">


    <div class="wrap-input100 validate-input" data-validate="Name is required">
           <span class="label-input100"><span class="error">*</span><?php if ($sponsorErr==1){ echo "<span class='error'>Sponser:</span>";} else{ echo "Sponsor:"; }?></span>
          <input class="input100" type="text" name="sponsor" placeholder="Enter Sponsor name" <?php if ($flag==1){ echo "value="."'".$edit_sponsorname."'";} ?> >
          <span class="focus-input100"></span>

        </div>
	<input type="hidden" name="button1" value="Include">
         <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">   URL:</span>
          <input class="input100" type="text" name="url" placeholder="Enter Website URL" <?php if ($flag==1){ echo "value="."'".$edit_url."'";} ?>>
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
<?php
$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';


$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());






$sql= "SELECT * FROM Sponsored_by where year='$year'";
$result = mysqli_query($dbConn, $sql); 
    
if (mysqli_num_rows($result)>0)

{
echo "<br>"; 
      echo "<p style='text-align: center; font-size:18px;'>Sponsors in year ".$year."</p>";

echo "<table>"; 

  echo "<thead>
            <tr>
              <th>Sponsor name</th>
              <th>Sponsor url</th>
              <th>Option</th>
            </tr>
          </thead>";
echo "<tbody>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['sponsor_name']."</td>";
    echo "<td>".$row['url']."</td>";
    echo "<td align='center'>";
    echo "<form action='";
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "' method='post'>";
    echo "<input type='hidden' name='sponsor_name' value='". $row['sponsor_name'] ."'>";
    echo "<input type='hidden' name='url' value='".$row['url']."'>";
    echo "<input type='submit' name='button1' value='Delete' style='margin-top:6px;padding:6px 10px;font-size: 18px; color:white;background-color:#373737; border-radius:10px'>";
    echo "<input type='submit' name='button1' value='Edit' style='margin-top:6px;padding:6px 10px;font-size: 18px; color:white;background-color:#373737; border-radius:10px'><br>";
    echo "</form>";
    echo "</td>";

  echo "</tr>";

    }
echo "</tbody>";

echo "</table>";
      }






     ?>      

<!--Showing the List of track topics-->







    <div class="clear"></div>
  </main>

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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
