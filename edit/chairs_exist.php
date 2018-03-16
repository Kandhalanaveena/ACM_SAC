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
          <li ><a href="title.php">Title</a></li>
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
              <li><a href="chairs_new_new.php">Add New</a></li>
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

<?php

//require 'globals_year.php';

$dbHost = 'Localhost';
$dbUser = 'b140622cs';
$dbPass = 'b140622cs';
$year=2018;
$dbName = 'db_b140622cs';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, $dbName) or die('Cannot select database. ' . mysqli_error());


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if($_POST["button1"]=="Edit")
  {
     $cid=$_POST['dcid'];
     header("Location: chairs_new.php?cid=$cid");
  }

else if($_POST["button1"]=="Delete")
  {
   $cid=$_POST['dcid'];
    $sql="DELETE FROM Chairs_Year WHERE cid='$cid' and year='$year'";
  $result = mysqli_query($dbConn, $sql); 
  }

else if($_POST["button1"]=="Add")
  {
    
    $acid=$_POST["acid"];
   $sql="INSERT into Chairs_Year (cid, year) 
    SELECT cid, "."'".$year."'"." FROM Chairs WHERE cid='$acid'"; 
    $result = mysqli_query($dbConn, $sql); 
  }
}


$sql= "SELECT cid, cname, designation, department, institute, city, state, pin, country, email, country_code, phone, fax  FROM Chairs ";

$result = mysqli_query($dbConn, $sql); 
if (mysqli_num_rows($result)>0)

{

echo "<p style='text-align: center; color:#222222; font-size:18px;'>Select the Chair Persons</p>";

echo "<table>"; 

  echo "<thead>
            <tr>
              <th>Professor name</th>
              <th>Information</th>
              <th>Email/fax</th>
              <th>Phone</th>
              <th></th>
            </tr>
          </thead>";
echo "<tbody>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['cname']."</td>";
    echo "<td>".$row['designation']."<br>".$row['department']."<br>".$row['institute']."<br>".$row['city']." - ".$row['pin']." , ".$row['state']."<br>".$row['country']."</td>";
    echo "<td>". $row['email']."<br>".$row['country_code']." ".$row['fax']."</td>";
    echo "<td>".$row['country_code']." ". $row['phone']."</td>";


    echo "<td align='center'  width='100px'>";
    echo "<form action='";
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "' method='post'>";
    echo "<input type='hidden' name='acid' value='". $row['cid'] ."'>";
    
    echo "<input type='submit' name='button1' value='Add' style='margin-top:6px;padding:6px 10px;font-size: 18px; color:white;background-color:#373737; border-radius:10px'>";
    echo "</form>";
  
   echo "</td>";

  echo "</tr>";

    }
echo "</tbody>";

echo "</table>";
      }





/* new table*/


$sql= "SELECT c.cid, c.cname, c.designation, c.department, c.institute, c.city, c.state, c.pin, c.country, c.email, c.country_code, c.phone, c.fax  FROM Chairs c, Chairs_Year y WHERE c.cid=y.cid and y.year='$year'";


$result = mysqli_query($dbConn, $sql); 
     // echo "hello1";

if (mysqli_num_rows($result)>0)

{

      echo "<br><p style='text-align: center; color:#222222; font-size:18px;'>Chair Persons included for ". $year."</p>";

echo "<table>"; 

  echo "<thead>
            <tr>
              <th>Professor name</th>
              <th>Information</th>
              <th>Email/fax</th>
              <th>Phone</th>
              <th></th>
            </tr>
          </thead>";
echo "<tbody>";
//echo "hello1";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['cname']."</td>";
    echo "<td>".$row['designation']."<br>".$row['department']."<br>".$row['institute']."<br>".$row['city']." - ".$row['pin']." , ".$row['state']."<br>".$row['country']."</td>";
    echo "<td>". $row['email']."<br>".$row['country_code']." ".$row['fax']."</td>";
    echo "<td>".$row['country_code']." ". $row['phone']."</td>";

    echo "<td align='center'  width='120px'>";
    echo "<form action='";
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "' method='post'>";
    echo "<input type='hidden' name='dcid' value='". $row['cid'] ."'>";
    
    echo "<input type='submit' name='button1' value='Edit' style='margin-top:6px;padding:6px 10px;font-size: 18px; color:white;background-color:#373737; border-radius:10px'><br>";
    echo "<input type='submit' name='button1' value='Delete' style='margin-top:6px;padding:6px 10px;font-size: 18px; color:white;background-color:#373737; border-radius:10px'>";
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
