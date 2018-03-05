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
<div class="bgded overlay" style="background-image:url('images/NIT-Calicut.jpg');"> 
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
    
    <div class="content three_quarter first"> 
      <h6>ACM SAC <?php echo $row['year'];?> </h6>
      <p>For the past <?php echo $row['number'];?> years, the ACM Symposium on Applied Computing has been a primary gathering forum for applied computer scientists, computer engineers, software engineers, and application developers from around the world. SAC <?php echo $row['year'];?>  is sponsored by the ACM Special Interest Group on Applied Computing (SIGAPP), and is <b>hosted by</b> </p>
      
       <ul>
         <?php
          $sql="SELECT * FROM Hosted_by WHERE year='$inputyear'";
          $result = mysqli_query($conn,$sql);
          while($hostrow = mysqli_fetch_array($result))
          {
            echo '<li><a href="'.$hostrow['url'].'" target="_blank" style="color:#00BCD4">'.$hostrow['university_name'].", ".$hostrow['country']."</a></li>";
          }
          $sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
          $result = mysqli_query($conn,$sql);
          $sponrow=mysqli_fetch_array($result);
?>


       </ul><br>
<p><b>The SRC Program is sponsored by</b></p><br>
<h1 style="font-size: 30px; text-transform: capitalize;">
          <?php echo '<a href="'.$sponrow['url'].'" target="_blank" style="color:#00BCD4">';
          ?><?php echo $sponrow['sponsor_name']
          ?></a>
          </h1>

    </div>
    <div class="sidebar one_quarter"> 
   <h5 style="text-transform: capitalize;">Quick Links</h5>
   <div class="sdb_holder">
   <p class="heading" style="text-transform: capitalize; font-size: 20px">Important Dates</p>
    <ul>
         <?php
          $sql="SELECT * FROM Important_dates WHERE year='$inputyear'";
          $result = mysqli_query($conn,$sql);
          while($datesrow = mysqli_fetch_array($result))
          {
            echo '<li>'.$datesrow['activity'].' : <br>'.$datesrow['start_date'].'</li><br>';
          }
          $sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
          $result = mysqli_query($conn,$sql);
          $sponrow=mysqli_fetch_array($result);
?>


       </ul>

   </div>
   <div class="sdb_holder">
   <p class="heading" style="text-transform: capitalize; font-size: 20px">Call for Papers</p>
   </div>
   <div class="sdb_holder">
   <p class="heading" style="text-transform: capitalize; font-size: 20px">Venue</p>
    <p>The conference will be held in - <br><br>
    <b> <?php echo $row['city'].", ".$row['country'];?> </b></p>
   </div>
    </div>
   
    <!-- / main body -->
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