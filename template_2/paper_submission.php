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

						echo '<a  style="color:white;"href="'.$row['url'].'" target="_blank">';
                 echo $row['number'].' '.$prefix;
          ?>
          ACM/ SIGAPP Symposium On Applied Computing</a></h6>
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

		
			</section>
<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content" style="color: black">
							<header class="align-center">
							 <h2 style="text-transform: capitalize;"><b>Paper Submission</b></h2>
							</header>
							<?php $sql="SELECT url FROM Submission_link WHERE year='$inputyear'";
                  $result = mysqli_query($dbConn,$sql);
                $linkrow = mysqli_fetch_array($result);
        $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='submission'";
          $result = mysqli_query($dbConn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p>";
      ?>
           <!-- <p style="text-align: justify;">The submissions should be in electronic format (pdf), based on original, unpublished work.. The file format should be PDF. The author(s) name(s) and address(es) must not appear in the body of the paper, and self-reference should be in the third person. This is to facilitate blind review. Only the title should be shown at the first page without the author's information. Papers must be formatted according to the template which is available at the SAC <?php ?> website :: <a href="https://www.sigapp.org/sac/" target="_blank">HERE</a>.</p> 
            <p style="text-align: justify;">Full paper size is limited to 6 pages according to the above mentioned template, being allowed a maximum of 2 extra pages at the additional cost of 80 USD per extra page. Poster papers are limited to 2 pages and no additional pages are permitted. A few key words should be provided. A paper cannot be sent to more than one track. Original manuscripts (regular papers) should be submitted in electronic format through the START Conference manager web site :<br> <?php echo '<a href="'.$linkrow['url'].'" target="_blank">'.$linkrow['url'].'</a>'?></p>-->
            <p>Abstracts for the Student Research Competition (SRC) should be submitted in electronic format through the START Conference manager web site : <br><?php echo '<a href="'.$linkrow['url'].'" target="_blank">'.$linkrow['url'].'</a>'?></p>
              <br><br>
              <h3><b>IMPORTANT NOTICE FOR THE AUTHORS</b></h3>

                <p style="text-align: justify;">Paper registration is required, allowing the inclusion of the paper/poster in the conference proceedings. An author or a proxy attending SAC MUST present the paper. This is a requirement for the paper/poster to be included in the ACM/IEEE digital library. No-show of scheduled papers and posters will result in excluding them from the ACM/IEEE digital library.</p>
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