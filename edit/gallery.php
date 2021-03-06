<?php
require 'session.php';
require '../open.php';

$year=$_SESSION['edit_year'];
 $uploadOk = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../gallery/".$year."/";
    if(file_exists($target_dir))
    {
      echo "file exists";
    }
    else
    {
      echo "file does not exists";
      if(mkdir($target_dir,0777,true))
      {
        if(chmod($target_dir , 0777))
        {
          echo "permission changed";
        }
        echo "directory created";
      }
      else
      {
        echo "directory not created";
      } 
      
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   
    // Check if image file is a actual image or fake image
    echo $_FILES['image']['name']."<br>";
    if(!empty($_FILES["image"]["name"])){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
          } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
            } 
    }
    else
    {
      $uploadOk=0;
    }
    
    // Check if file already exists
   echo $uploadOk."<br>";
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    else
    {
        echo "file does not exists";

    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
            $name=basename($_FILES["image"]["name"]);  
            $sql="INSERT INTO Gallery (imagename, year) VALUES ('$name', '$year')";


            $result = mysqli_query($dbConn, $sql);
            if($result)
            {
                  header("Location:gallery.php");
            }

        } 
        else {
            echo "Sorry, there was an error uploading your file.";
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
          <li ><a href="title.php">Title</a></li>
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
          <li class="active"><a href="gallery.php">Gallery</a></li>
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
    <?php echo '<h4 style="text-align:center; color:black">You are currently editing '.$year.' website</h4>';?>

<div class="wrap-contact100" style="color:#222222; ">
<br>
<p style="text-align: center;font-size:20px;">Gallary Images</p>
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
<br>
<br>
<?php
$sql= "SELECT * FROM Gallery WHERE year='$year'";


$result = mysqli_query($dbConn, $sql); 
     
if ($result && mysqli_num_rows($result)>0)
{
  $length=mysqli_num_rows($result);

echo '<div class="content">'; 
echo '<div id="gallery">';
echo '<figure>';
echo '<header class="heading">Uploaded Images for year '.$year.'</header>';
echo '<br>';
echo '<ul class="nospace clear">';

$iter=1;
$outerloop=intdiv ( $length, 4)+1;
for ($i=0; $i <$outerloop ; $i++) { 
  # code...
  if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$year."/".$imagerow['imagename'];
   echo '<li class="one_quarter first"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }
 if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$year."/".$imagerow['imagename'];
   echo '<li class="one_quarter"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }
 if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$year."/".$imagerow['imagename'];
   echo '<li class="one_quarter"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }
 if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$year."/".$imagerow['imagename'];
   echo '<li class="one_quarter"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }

}
echo "</ul>";
echo "</figure>";
echo "</div>";
echo "</div>";
echo "<!--Showing the List of track topics-->";
}
?>
 <div class="clear"></div>
  </main>
</div>
<?php
require '../close.php'
?>
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
