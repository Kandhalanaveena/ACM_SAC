<?php
require 'session.php';
require '../open.php';

// define variables and set to empty values
$paraErr  =0;
$para  ="";
$year=$_SESSION['edit_year'];
$type="submission";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["para"])) {
    $paraErr = 1;
  } else {
    $para = test_input($_POST["para"]);
  }
  
/* inserting into databse*/

if($paraErr == 0)
{
  $sql="SELECT * FROM Paras WHERE year='$year' and type='$type'";
  $result = mysqli_query($dbConn, $sql);

  if($result && mysqli_num_rows($result)>0) {
      $sql="UPDATE Paras SET para='$para' where year='$year' and type='$type'";
        $result = mysqli_query($dbConn, $sql);
    }
   else
   {

    $sql="INSERT into Paras (para, year, type) VALUES ('$para','$year','$type')";
      $result = mysqli_query($dbConn, $sql);
   }
  }
}


$sql="SELECT * from Paras WHERE year='$year' and type='$type'";
$result = mysqli_query($dbConn, $sql);

if($result)
  {
    $row=mysqli_fetch_array($result);
    if($paraErr==0 && empty($para))
    {
      $para=$row['para'];
    }
  }

function test_input($data) {
  $data = trim($data);
  $data = addslashes($data);
  $data = htmlspecialchars($data);
  $data=nl2br($data);
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
          <li ><a href="prog_members.php">Program Committee</a></li>
          <li class="active"><a class="drop" href="">Paragraphs</a>
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

<div class="wrap-contact100" style="color:#222222;width: 970px">
<br>

    <p style="text-align: center;font-size:20px;">Paper Submission</p>
    <p style="text-align: center;padding-top: 10px">Enter the information with minimum 10 characters and seperate multiple paragraphs by newline !!! &#x263A
    </p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">


<div class="wrap-input100 validate-input"  data-validate="Name is required">
           <span class="label-input100"><span class="error">*</span><?php if ($paraErr==1){ echo "<span class='error'>Paragraph:</span>";} else{ echo "Paragraph:"; }?></span>
          <textarea class="input100" name="para" minlength="10" placeholder="Enter paragraph ....... " >
            <?php if ($paraErr==0){ echo strip_tags($para);} ?>
          </textarea>
          <span class="focus-input100" ></span>

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


<!--Showing the List of track topics-->




<?php
require '../close.php'
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
