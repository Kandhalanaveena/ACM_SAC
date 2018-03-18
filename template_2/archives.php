<?php
require '../open.php';
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
	<?php

$inputyear=$_GET['year'];
$sql="SELECT * FROM Info WHERE year='$inputyear'";
$result = mysqli_query($dbConn,$sql);


$row = mysqli_fetch_array($result);
echo "<title>ACM SAC ".$row['year']."</title>";
?>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li class="active"><?php echo '<a href="home.php?year='.$inputyear.'">' ?>Home</a></li>
          <li><?php echo '<a href="proceedings.php?year='.$inputyear.'">' ?> Proceedings</a></li>
          <li><?php echo '<a href="track_topics.php?year='.$inputyear.'">' ?>Track Topics</a></li>
          <li><?php echo '<a href="paper_submission.php?year='.$inputyear.'">' ?>Paper Submission</a></li>
          <li><?php echo '<a href="chairs.php?year='.$inputyear.'">' ?>Chairs</a></li>
          <li><?php echo '<a href="program_committee.php?year='.$inputyear.'">' ?>Program Committee</a></li>
          <li><?php echo '<a href="archives.php?year='.$inputyear.'">' ?>Archives</a></li>
				</ul>
			</nav>

		<!-- Banner -->

			<section class="banner full">
				<article>
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
							echo '<img src="../background_images/'.$imagename.'"  />';
							

      					}
      					else
      					{echo '<img src="images/NIT-Calicut.jpg"  />';
        						
        				} ?> 
					<div class="inner">
						<header>
						<h6 style="font-size: 25px; text-transform: capitalize;">
						<?php echo '<a  style="color:white;"href="'.$row['url'].'" target="_blank">';
                 echo $row['number'];
          ?>
          rd ACM/ SIGAPP Symposium On Applied Computing</a></h6>
          <h2 ><?php echo '<a href="'.$row['url'].'"target="_blank" >' ?>ACM SAC <?php echo $row['year'];
          ?></a></h2>
          <h6 style="font-size: 25px; text-transform: capitalize;">Track On Cloud Computing</h6>
       
       
          <h6  style="font-size: 25px; text-transform: capitalize;" > <?php echo $row['city'].", ".$row['country'];
          ?></h6>
							<?php $month1 = date('F', strtotime($row['start_date']));
                $month2 = date ('F', strtotime($row['end_date']));
                $date1 = date("d", strtotime($row['start_date']));
                $date2 = date("d", strtotime($row['end_date'])); 
           if($month1==$month2){     
            echo '<h6 style="font-size: 25px; text-transform: capitalize;">'.$month1.' '.$date1.' - '.$date2.', '.$row["year"].'</h6>';
          }
          else
              {
                echo '<h6 style="font-size: 25px; text-transform: capitalize;">'.$month1.' '.$date1.' - '.$month2.' '.$date2.', '.$row["year"].'</h6>';
              }
            ?>
      
						</header>
					</div>
				</article>
				
			</section>

		
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content" style="color: black">
							<header class="align-center">
							 <h2 style="text-transform: capitalize;"><b>Previous Year Websites</b></h2>
							</header>
							<ul>
    <?php
    $limityear=2017;  
    $sql="SELECT year, temp_no FROM Info WHERE year>'$limityear' and year<='$inputyear' ORDER BY year DESC;";
  $result = mysqli_query($dbConn,$sql);


while($archrow = mysqli_fetch_array($result))
{
echo '<li><a href="../template_'.$archrow['temp_no'].'/home.php?year='.$archrow['year'].'" target="_blank" >Year '.$archrow['year'].'</a></li>';
}

?>  
      <li><a href="http://www.nitc.ac.in/sac/sac2017/cc.htm" target="_blank" >Year 2017</a></li>
        <li><a href="http://www.nitc.ac.in/sac2018/bisite.usal.es/sac2016/cc/" target="_blank" >Year 2016</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2014/cc.htm" target="_blank" >Year 2014</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2013/cc.htm" target="_blank" >Year 2013</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2012/cc.htm" target="_blank" >Year 2012</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac_2011/" target="_blank" >Year 2011</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2010/cc.htm" target="_blank" >Year 2010</a></li>
    </ul>
  
							
						</div>
					</div>
				</div>
			</section>	

		
	


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					
				</div>
				<div class="copyright">
					
				</div>
			</footer>
<?php
require '../close.php';
?>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>