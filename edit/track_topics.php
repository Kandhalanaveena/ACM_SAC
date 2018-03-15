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
          <li><a href="title.php">Title</a></li>
          <li><a class="drop" href="">Home</a>
            <ul>
              <li><a href="host.php">Hosted by</a></li>
              <li><a href="sponsor.php">Sponsored by</a></li>
              <li><a href="imp_dates.php">Important dates</a></li>
              <li><a href="sub_link.php">Submission Link</a></li>
            </ul>
          </li>
          <li class="active"><a href="">Track Topics</a></li>
          <li ><a class="drop" href="">Chair persons</a>
            <ul>
              <li><a href="chairs_exist.php">Add Existing</a></li>
              <li><a href="chairs_new.php">Add New</a></li>
            </ul>
          </li>
          <li><a href="prog_members.php">Program Committee</a></li>
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
<div class="wrap-contact100" style="color:#222222; ">
<br>
<p style="text-align: center;font-size:20px;">Topic details</p>
     
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
    
    $tid=$_POST["tid"];
    //echo "year";
    //echo $acid;
    $flag=1;
    $sql="SELECT tname from Topics WHERE tid='$tid'";

  $result = mysqli_query($dbConn, $sql); 
  
  $topicrow=mysqli_fetch_array($result);
  $edit_tname=$topicrow['tname'];

}

else if($_POST["button1"]=="Delete")
  {
   
    $tid=$_POST["tid"];
    //echo "year";
    //echo $dcid;

    $sql="DELETE FROM Topics_Year WHERE tid='$tid' and year='$year'";
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

<form class="contact100-form validate-form" action="db_topic.php" method="post" autocomplete="off">

<input type='hidden' name='tid' 
          <?php if($flag==1) {
            echo "value='".$tid."'";
          }?>
          >

<div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Topic Name:</span>
          <input class="input100" type="text" list="tt_names" name="tt_name" placeholder="Enter track topic" <?php if($flag==1) {
            echo "value='".$edit_tname."'";
          }?>
          >
          <span class="focus-input100"></span>
        </div>

<datalist id="tt_names">
<?php


$sql="SELECT tname FROM Topics";
$result = mysqli_query($dbConn, $sql);
    while ($datarow = mysqli_fetch_array($result)) {
    echo "<option value="."'".$datarow['tname']."'"."/>" ;
    }


?>
</datalist>
<div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Include
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>
<br>
<br>
</div>

<?php

/*$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$dbName = 'db_b140622cs';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());
*/
$sql= "SELECT t.* FROM Topics as t, Topics_Year as y where y.tid=t.tid and y.year='$year'";


$result = mysqli_query($dbConn, $sql); 
      
if (mysqli_num_rows($result)>0)

{
echo "<br>"; 
      echo "<p style='text-align: center; font-size:18px;'>Track Topics in year ".$year."</p>";

echo "<table>"; 

  echo "<thead>
            <tr>
              <th>Track Topic name</th>
              <th>Option</th>
            </tr>
          </thead>";
echo "<tbody>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['tname']."</td>";
    echo "<td align='center'>";
    echo "<form action='";
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "' method='post'>";
    echo "<input type='hidden' name='tid' value='". $row['tid'] ."'>";
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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>