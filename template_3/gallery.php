<!DOCTYPE html>

<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
$inputyear=$_GET['year'];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="SELECT * FROM Info WHERE year='$inputyear'";
$result = mysqli_query($conn,$sql);


$row = mysqli_fetch_array($result);
echo "<title>ACM SAC ".$row['year']."</title>";
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<?php
$sql="SELECT * FROM Back_images WHERE year='$inputyear'";
$result = mysqli_query($conn,$sql);
$imagename='';
if($result)
{
$imagerow = mysqli_fetch_array($result);
$imagename=$imagerow['imagename'];
}

if(!empty($imagename)){
echo '<div class="bgded overlay" style="background-image:url('."'../background_images/".$imagename."'".');">';
      }
      else
      {
        echo '<div class="bgded overlay" style="background-image:url('."'images/NIT-Calicut.jpg');".'">'; 
        } ?> 
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
  
     
      
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      
      <!-- ################################################################################################ -->
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li ><?php echo '<a href="home.php?year='.$inputyear.'">' ?>Home</a></li>
          <li><?php echo '<a href="proceedings.php?year='.$inputyear.'">' ?> Proceedings</a></li>
          <li><?php echo '<a href="track_topics.php?year='.$inputyear.'">' ?>Track Topics</a></li>
          <li><?php echo '<a href="paper_submission.php?year='.$inputyear.'">' ?>Paper Submission</a></li>
          <li><?php echo '<a href="chairs.php?year='.$inputyear.'">' ?>Chairs</a></li>
          <li><?php echo '<a href="program_committee.php?year='.$inputyear.'">' ?>Program Committee</a></li>
          <li><?php echo '<a href="archives.php?year='.$inputyear.'">' ?>Archives</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
 
  <div class="wrapper">
    <div id="pageintro" class="hoc clear"> 
      <article >
        <div>
          <p class="heading">
          <?php echo '<a  style="color:white;"href="'.$row['url'].'">';
                 echo $row['number'];
          ?>
          rd ACM/ SIGAPP Symposium On Applied Computing</a></p>
          <h2 class="heading"><?php echo '<a href="'.$row['url'].'"target="_blank" style="color: white;">' ?>ACM SAC <?php echo $row['year'];
          ?></a></h2>
          <p class="heading" style="font-size: 25px; text-transform: capitalize;">Track On Cloud Computing</p>
        </div>
       
          <p class="heading" style="text-transform: capitalize;" > <?php echo $row['city'].", ".$row['country'];
          ?></p>
          <?php $month1 = date('F', strtotime($row['start_date']));
                $month2 = date ('F', strtotime($row['end_date']));
                $date1 = date("d", strtotime($row['start_date']));
                $date2 = date("d", strtotime($row['end_date'])); 
           if($month1==$month2){     
            echo '<p class="heading">'.$month1.' '.$date1.' - '.$date2.', '.$row["year"].'</p>';
          }
          else
              {
                echo '<p class="heading">'.$month1.' '.$date1.' - '.$month2.' '.$date2.', '.$row["year"].'</p>';
              }
            ?>
      
      </article>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
<?php
$sql= "SELECT * FROM Gallery WHERE year='$inputyear'";


$result = mysqli_query($conn, $sql); 
     
if ($result && mysqli_num_rows($result)>0)
{
  $length=mysqli_num_rows($result);

echo '<div class="content">'; 
echo '<div id="gallery">';
echo '<figure>';
echo '<header class="heading">Image Gallery ACM SAC '.$inputyear.'</header>';
echo '<br>';
echo '<ul class="nospace clear">';

$iter=1;
$outerloop=intdiv ( $length, 4)+1;
for ($i=0; $i <$outerloop ; $i++) { 
  # code...
  if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
   echo '<li class="one_quarter first"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }
 if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
   echo '<li class="one_quarter"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }
 if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
   echo '<li class="one_quarter"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
    $iter=$iter+1;
 }
 if($iter<=$length)
  {
   $imagerow=mysqli_fetch_array($result);
   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
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


<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
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
