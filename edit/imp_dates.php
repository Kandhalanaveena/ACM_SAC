<?php

// define variables and set to empty values
require 'session.php';
require '../open.php';


$year=$_SESSION['edit_year'];

$actErr = $dateErr= 0;
$act = $date= "";
$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
/* inserting into databse*/

if($_POST["button1"]=="Edit")
  {
    $act = $_POST["act"];
    $date =$_POST["date"];
    
    $actErr=$dateErr=1;
    $flag=1;
  }

else if($_POST["button1"]=="Delete")
  {
    $act = $_POST["act"];
    $date =$_POST["date"];
    $flag=2;
    $sql="DELETE FROM Important_dates WHERE activity='$act' and start_date='$date' and year='$year'";
    $result = mysqli_query($dbConn, $sql); 
  }
  else
  {
    $isedit=$_POST['isedit'];
    $act = test_input($_POST["act_name"]);
    $date=$_POST["date"];

    if($isedit==1) 
      {
        $prev_act=$_POST['edit_act'];
        $prev_date=$_POST['edit_date'];
        $sql="UPDATE  Important_dates  SET activity='$act', start_date='$date' WHERE activity='$prev_act' AND start_date='$prev_date'";
        $result = mysqli_query($dbConn, $sql);  
       
      }
    else if($isedit==0)
      {
        $sql="INSERT into Important_dates (activity, start_date, year) 
              VALUES ( '$act', '$date', '$year')";
          $result = mysqli_query($dbConn, $sql);  
      }
    
  }

}

function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data=ucfirst(strtolower($data));
  return $data;
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
          <li  class="active"><a class="drop" href="">Home</a>
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
          <li ><a href="prog_members.php">Program Committee</a></li>
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

    <p style="text-align: center;font-size:20px;">Important Dates</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">

  <input type="hidden" name="button1" value="Include">
  <input type="hidden" name="isedit" value="<?php echo $flag;?>">
  <input type="hidden" name="edit_act" value="<?php echo $act;?>">
  <input type="hidden" name="edit_date" value="<?php echo $date;?>">

    <div class="wrap-input100 validate-input" data-validate="Name is required">
           <span class="label-input100"><span class="error">*</span>Notification : </span>
          <input class="input100" type="text" name="act_name" required placeholder="Enter Activity Name" 
          <?php 
          if ($actErr==1)
            { 
              echo "value="."'".$act."'";
            } ?> 
          >
          <span class="focus-input100"></span>

        </div>


        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span>Date :</span>
          <input class="input100" type="date" name="date" required placeholder="Enter Date" 
          <?php 
          if ($dateErr==1)
            { 
              echo "value="."'".$date."'";
            } 
          ?>
          >
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
<br>
<br>
</div>

<?php

$sql = "SELECT activity, start_date FROM Important_dates WHERE year='$year'";
$result = mysqli_query($dbConn, $sql);

if (mysqli_num_rows($result)>0)
{
  echo "<br>";
      echo "<p style='text-align: center; color:#222222; font-size:18px;'>Important dates in ". $year."</p>";

  echo "<table  align='center' style='max-width:680px;'>"; 

  echo "<thead>
            <tr>
              <th>Notifications</th>
              <th></th>
            </tr>
          </thead>";
echo "<tbody>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['activity']. " , " . $row['start_date'] . "</td>";
    
    echo "<td align='center'>";
    echo "<form action='";
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
    echo "' method='post'>";
    echo "<input type='hidden' name='act' value='". $row['activity'] ."'>";
     echo "<input type='hidden' name='date' value='". $row['start_date'] ."'>";
      
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



<?php
require '../close.php';
?>



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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
