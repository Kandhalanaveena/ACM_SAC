<?php

require 'session.php';
require '../open.php'; 

// define variables and set to empty values

$year=$_SESSION['edit_year'];



 $uploadOk = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../background_images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $name=basename($_FILES["image"]["name"]);
    $position= strrpos($name, "."); 
    $fileextension= substr($name, $position + 1);
    $fileextension= strtolower($fileextension);
    // Check if file already exists
    $target_file = $target_dir . $year.'.'.$fileextension;
    // Check if image file is a actual image or fake image
    if(!empty($_FILES["image"]["tmp_name"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
          } 
        else {
            //echo "File is not an image.";
            $uploadOk = 0;
            } 
    }
    else
    {
      $uploadOk=0;
    }
    
    

    if ($uploadOk == 0) {
         echo '<script type="text/javascript">
                    alert("Upload failure, Try again !!");
                    window.location.href="back_image.php";
                    </script>';
    } 
    else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
            $name= $year.'.'.$fileextension; 
           /* $sql="INSERT INTO Back_images (imagename, year) VALUES ('$name', '$year')";


            $result = mysqli_query($dbConn, $sql);
            if($result)
            {
                  //header("Location:back_image.php");
                    echo '<script type="text/javascript">
                    alert("File uploaded successfully !!");
                    window.location.href="back_image.php";
                    </script>';

                
            }*/
             echo '<script type="text/javascript">
                    alert("File uploaded successfully !!");
                    window.location.href="track_topics.php";
                    </script>';

        } 
        else {
            //echo "Sorry, there was an error uploading your file.";
          echo '<script type="text/javascript">
                    alert("Sorry, Uploading failure !!");
                    window.location.href="track_topics.php";
                    </script>';
        }
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
          <li><a href="title.php">Title</a></li>
          <li class="active"><a class="drop" href="">Home</a>
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
          <li ><a class="drop" href="chairs_exist.php">Chair persons</a>
            <ul>
              <li><a href="chairs_exist.php">Add Existing</a></li>
              <li><a href="chairs_new.php">Add New</a></li>
            </ul>
          </li>
          <li><a href="prog_members.php">Program Committee</a></li>
          <li><a class="drop" href="">Paragraphs</a>
            <ul>
              <li><a href="para_home.php">Introduction</a></li>
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




</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
<div class="wrap-contact100" style="color:#222222; ">
<br>
<p style="text-align: center;font-size:20px;">Background Image</p>
     <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100"><span class="error">*</span><?php if ($uploadOk==0){ echo "<span class='error'>Image :</span>";} else{ echo "Image :"; }?></span>
          <input class="input100" type="file" name="image" placeholder="Upload Image">
          
          <span class="focus-input100"></span>
        </div>


      <div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            <span>
              Upload
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
</body>
</html>