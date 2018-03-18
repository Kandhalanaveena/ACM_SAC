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
<!-- Top Background Image Wrapper --><?php
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
         <li ><?php echo '<a href="home.php?year='.$inputyear.'">' ?>Home</a></li>
          <li ><?php echo '<a href="proceedings.php?year='.$inputyear.'">' ?> Proceedings</a></li>
          <li class="active"><?php echo '<a href="track_topics.php?year='.$inputyear.'">' ?>Track Topics</a></li>
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
          <?php 
          $decimal=$row['number']%10;
              
              if($decimal==1){
                $prefix='st';
              }
              elseif ($decimal==2) {
                # code...
                $prefix='nd';
              }
              elseif ($decimal==3) {
                # code...
                $prefix='rd';
              }
              else
              {
                $prefix='th';
              }
          echo '<a  style="color:white;"href="'.$row['url'].'">';
                 echo $row['number'].' '.$prefix;
          ?>
           ACM/ SIGAPP Symposium On Applied Computing</a></p>
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
    <h6 style="text-transform: capitalize;text-align: center;">Track Topics</h6>
    <br>
     <?php
        $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='topics'";
          $result = mysqli_query($dbConn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p><br>";
     
  /*<!-- <p style="text-align: justify;">The ACM SAC <?php  echo $row['year']; ?> Track on Cloud Computing welcomes paper submissions on all aspects of cloud computing research and applications with emphasis on those describing research on different forms of virtualization techniques as applied to systems computing. However the main theme of the CC track for this year is security of data in clouds. The list of possible topics includes but is not restricted to the following areas :</p>-->*/ 

  
     $sql="SELECT t.tname FROM Topics as t, Topics_Year as y WHERE y.tid=t.tid and y.year='$inputyear'";
$result = mysqli_query($dbConn,$sql);

if (mysqli_num_rows($result) > 0) {
  echo '<p style="text-align: justify;">The list of possible topics includes but is not restricted to the following areas :</p>';
  echo    "<ul>";
while($topicrow = mysqli_fetch_array($result))
{
echo "<li>" . $topicrow['tname'] . "</li>";
}
}
?>
   </ul><br>
  <!-- <p style="text-align: justify;">This track welcomes theoretical models, algorithms, practical results, description and analysis of experiments and demonstrations of working prototypes of cloud computing applications. Your paper needs to be submitted to the track chairs.</p> -->

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