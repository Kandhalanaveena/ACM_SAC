<?php
require '../open.php';
?>

<!DOCTYPE html>

<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<?php

$inputyear=$_GET['year'];
$sql="SELECT * FROM Info WHERE year='$inputyear'";
$result = mysqli_query($dbConn,$sql);


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
$result = mysqli_query($dbConn,$sql);
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
          <li class="active"><?php echo '<a href="home.php?year='.$inputyear.'">' ?>Home</a></li>
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
    
    <div class="content three_quarter first" style="width: 66%"> 
      <h6>ACM SAC <?php echo $row['year'];?> </h6>
      <?php
        $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='home'";
          $result = mysqli_query($dbConn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p>";
          
      ?>
     <!-- <p>For the past <?php echo $row['number'];?> years, the ACM Symposium on Applied Computing has been a primary gathering forum for applied computer scientists, computer engineers, software engineers, and application developers from around the world. SAC <?php echo $row['year'];?>  is sponsored by the ACM Special Interest Group on Applied Computing (SIGAPP), and is <b>hosted by</b> </p>
      -->
       
         <?php
          $sql="SELECT * FROM Hosted_by WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          if(mysqli_num_rows($result) > 0) {
           
           echo "<ul>";
           echo  "<p><b>The SRC Program is hosted by</b></p><br>";
          while($hostrow = mysqli_fetch_array($result))
          {
            echo '<li><a href="'.$hostrow['url'].'" target="_blank" style="color:#00BCD4">'.$hostrow['university_name'].", ".$hostrow['country']."</a></li>";
          }
          echo  "</ul><br>";
        }
          $sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          if(mysqli_num_rows($result) > 0) {
           echo "<ul>";
            echo "<p><b>The SRC Program is sponsored by</b></p><br>";

          while ($sponrow=mysqli_fetch_array($result)){
              echo '<li><h1 style="font-size: 20px; text-transform: capitalize;">';
              echo '<a href="'.$sponrow['url'].'" target="_blank" style="color:#00BCD4">'.$sponrow['sponsor_name'].'</a>';
              echo "</h1></li>";
            }
            echo "</ul><br>";
         } 
?>
    </div>
    <div class="sidebar one_quarter" style="width: 30%"> 
   <b><h5 style="text-transform: capitalize;">Quick Links</h5></b>
   <?php
      $sql="SELECT * FROM Gallery WHERE year='$inputyear'";
      $result = mysqli_query($dbConn,$sql);
      if(mysqli_num_rows($result)>0){
            echo '<div class="sdb_holder">';
            echo '<p class="heading" style="text-transform: capitalize; font-size: 20px">Gallery</p><ul>';
         
            echo '<p>Photos of conference are availiable <a href="gallery.php?year='.$inputyear.'">here</a>.</p></ul></div>';
 }
?>  
<hr>
 <div class="sdb_holder">
   <p class="heading" style="text-transform: capitalize; font-size: 20px">Important Dates</p>
    <ul>
         <?php
         date_default_timezone_set('Asia/Kolkata');
         $today=new DateTime('');
          $sql="SELECT * FROM Important_dates WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          while($datesrow = mysqli_fetch_array($result))
          {
            $notfdate=new DateTime($datesrow['start_date']);
            if($today->format('Y-m-d')>$notfdate->format('Y-m-d'))
            { 
              echo '<li>'.$datesrow['activity'].' : <strike>'.$datesrow['start_date'].'</strike></li>';
             }
             else
             {
             echo '<li>'.$datesrow['activity'].' : '.$datesrow['start_date'].'</li>';
                                    
            }
          }
          $sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          $sponrow=mysqli_fetch_array($result);
?>


       </ul>

   </div>
   <hr>
   <div class="sdb_holder">
   <p class="heading" style="text-transform: capitalize; font-size: 20px">Call for Papers</p>
   <?php
    $sql="SELECT * FROM Files_table WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          $filerow=mysqli_fetch_array($result);
          $pdflink="../pdf/".$filerow['pdf_name'];
   ?>
   <a href="<?php echo $pdflink; ?>" ><i class="fa fa-file-pdf-o" style="font-size:36px; "></i></a>
   </div>
   <hr>
   <div class="sdb_holder">
   <p class="heading" style="text-transform: capitalize; font-size: 20px">Venue</p>
    <p>The conference will be held in - <br>
    <b> <?php echo $row['city'].", ".$row['country'];?> </b></p>
   </div>
    </div>
   
    <!-- / main body -->


    <div class="clear"></div>
  </main>
</div>


<?php
require '../close.php';
?>


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