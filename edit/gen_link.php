<?php

require 'session.php';
require '../open.php'; 

// define variables and set to empty values
//$temp_no=$_SESSION['create_tempno'];

$year=$_SESSION['edit_year'];
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
         <!-- <li><a href="home.html">Admin</a></li>-->
          <li><a href="title.php">Title</a></li>
          <li><a class="drop" href="">Home</a>
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
          <li><a href="gallery.php">Gallery</a></li>
          <li class="active"><a class="drop" href="">User</a>
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
<div class="wrap-contact100" style="color:#222222;width: 800px">
<br>
<br>

<?php
$sql="SELECT temp_no from Info WHERE year='$year'";
$result = mysqli_query($dbConn, $sql);
$temp_no=0;
if($result)
{
  $inforow=mysqli_fetch_array($result);
  $temp_no=$inforow['temp_no'];
}
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$curr_page=strrchr ($actual_link , '/' );
$substring1=substr($actual_link ,0,strlen($actual_link)-strlen($curr_page));
$curr_page=strrchr ($substring1 , '/' );
$substring=substr($substring1 ,0,strlen($substring1)-strlen($curr_page)+1);
$link=$substring."template_".$temp_no."/home.php?year=".$year;
?>
    
    <p style="text-align: center;">Copy the link and paste in browser to use the ACM SAC website.
    </p>
     <form class="contact100-form validate-form" autocomplete="off">


<div class="wrap-input100 validate-input"  data-validate="Name is required">
           <span class="label-input100">Link:</span>
         <input class="input100" type="text" id="web_link" placeholder="Enter Year" <?php echo "value="."'".$link."'"; ?> readonly >
          <span class="focus-input100" ></span>

        </div>
        

<div class="container-contact100-form-btn">
          <button class="contact100-form-btn" onclick="Generate_link()">
            <span>
              Copy Link
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>


 


<br>
<br>
</div>


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
<script>
function Generate_link() {
  var copyText = document.getElementById("web_link");

  copyText.select();
  document.execCommand("Copy");
  alert("Copied the link: " + copyText.value);
}
</script>
</body>
</html>