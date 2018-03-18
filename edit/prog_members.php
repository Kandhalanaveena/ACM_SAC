<?php
require 'session.php';
require '../open.php';
$year=$_SESSION['edit_year'];

$nameErr = $countryErr=  0;
$name = $country = "";


$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if($_POST["button1"]=="Edit")
  {
    
    $pid=$_POST["pid"];
    
    $sql="SELECT * from Program_committee WHERE pid='$pid'";
    $result = mysqli_query($dbConn, $sql); 
    $memrow=mysqli_fetch_array($result);
    $pname=$memrow['pname'];
    $country=$memrow['country'];

    $nameErr=$countryErr=1;
    $flag=1;
  }

else if($_POST["button1"]=="Delete")
  {
  $pid=$_POST["pid"];
  $flag=2;
  $sql="DELETE FROM Program_committee_Year WHERE pid='$pid' and year='$year'";
  $result = mysqli_query($dbConn, $sql); 
  }
}
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
          <li ><a href="title.php">Title</a></li>
          <li  ><a class="drop" href="">Home</a>
            <ul>
              <li><a href="host.php">Hosted by</a></li>
              <li><a href="sponsor.php">Sponsored by</a></li>
              <li><a href="imp_dates.php">Important dates</a></li>
              <li><a href="sub_link.php">Submission Link</a></li>
              <li><a href="call_for_papers.php">Call for Papers</a></li>
              <li><a href="back_image.php">Background Image</a></li>
            </ul>
          </li>
          <li ><a href="track_topics.php">Track Topics</a></li>
         <li><a class="drop" href="">Chair persons</a>
            <ul>
              <li><a href="chairs_exist.php">Update Existing</a></li>
              <li><a href="chairs_new_new.php">Add New</a></li>
            </ul>
          </li>
          <li class="active"><a href="prog_members.php">Program Committee</a></li>
          <li><a class="drop" href="">Paragraphs</a>
            <ul>
              <li><a href="para_home.php">Introduction (Home)</a></li>
              <li><a href="para_proceedings.php">Proceedings</a></li>
              <li><a href="para_submission.php">Paper Submission</a></li>
              <li><a href="para_topics.php">Track topics</a></li>
            </ul>
          </li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a class="drop" href="">User</a>
            <ul>
              <li><a href="../home.php">Back to Admin</a></li>
              <li><a href="../logout.php">Logout</a></li>
              <li><a href="gen_link.php">Website Link</a></li>
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
    <?php echo '<h4 style="text-align:center; color:black">You are currently editing '.$year.' website</h4>';?>

<div class="wrap-contact100" style="color:#222222;">
<br>
    <p style="text-align: center;font-size:20px;">Member details</p>
     



<form class="contact100-form validate-form" action="db_prog.php" method="post" autocomplete="off">



  <input type="hidden" name="isedit" value="<?php echo $flag;?>">
  <input type='hidden' name='edit_pid' value="<?php echo $pid;?>">
  
<div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span>Name:</span>
          <input class="input100" type="text" list="mem_names" name="mem_name" required placeholder="Enter name"
          <?php if($nameErr==1) {
            echo "value='".$pname."'";
          }?>
          >
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span>Country:</span>
          <input class="input100" type="text" list="countries" name="country" required placeholder="Enter country"
          <?php if($countryErr==1) {
            echo "value='".$country."'";
          }?>
          >
          <span class="focus-input100"></span>
        </div>

<datalist id="mem_names">

<?php

$sql="SELECT distinct pname FROM Program_committee";
$result = mysqli_query($dbConn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value="."'".$row['pname']."'"."/>" ;
    }


?>
</datalist>

<datalist id="countries">
<?php

$sql="SELECT distinct country FROM Program_committee";
$result = mysqli_query($dbConn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value="."'".$row['country']."'"."/>" ;
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

$sql = "SELECT p.pname,p.country,p.pid  FROM Program_committee as p, Program_committee_Year as y where y.pid=p.pid and y.year='$year' ORDER BY p.pname ASC";
$result = mysqli_query($dbConn, $sql);

if (mysqli_num_rows($result)>0)

{
echo "<br>";
      echo "<p style='text-align: center; color:#222222; font-size:18px;'>Committee Members in ". $year."</p>";

echo "<table  align='center' style='max-width:680px;'>"; 

  echo "<thead>
            <tr>
              <th>Committee Member</th>
              <th></th>
            </tr>
          </thead>";
echo "<tbody>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['pname']." , ".$row['country']."</td>";
    
    echo "<td align='center'>";
    echo "<form action='";
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "' method='post'>";
    echo "<input type='hidden' name='pid' value='". $row['pid'] ."'>";
    
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






<?php
require '../close.php';
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
