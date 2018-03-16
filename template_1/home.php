<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Favicon -->
   <!--< <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>-->
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
	<!-- Montserrat for title -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	
  	<!-- Start Header -->
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






	<header id="mu-hero" class="" role="banner">
		<!-- Start menu  -->
		<nav class="navbar navbar-fixed-top navbar-default mu-navbar">
		  	<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>

			      <!-- Logo -->
			      <a class="navbar-brand" href="home.php">ACM SAC</a>

			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      	<ul class="nav navbar-nav mu-menu navbar-right">
			      		<li><a href="#mu-hero">Home</a></li>
                                       <li><a href="#mu-importantDates">Dates</a></li>
				        <li><a href="#mu-about">About</a></li>
				        <li><a href="#mu-proceedings">Proceedings</a></li>
			            <li><a href="#mu-trackTopics">Track Topics</a></li>
			            <li><a href="#mu-paperSubmission">Paper Submission</a></li>
			            <li><a href="#mu-chairs">Chairs</a></li>
			            <li><a href="#mu-programCommittee">Committee</a></li>
			            <li><a href="#mu-archives">Archives</a></li>
			      	</ul>
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
		</nav>
		<!-- End menu -->

		<div class="mu-hero-overlay">
			<div class="container">
				<div class="mu-hero-area">

					<!-- Start hero featured area -->
					<div class="mu-hero-featured-area">
						<!-- Start center Logo -->
					<!--	<div class="mu-logo-area">
							<!-- text based logo 
							<a class="mu-logo" href="#">Eventoz</a>
							<!-- image based logo 
							<!-- <a class="mu-logo" href="#"><img src="assets/images/logo.jpg" alt="logo img"></a> 
						</div> -->
						<!-- End center Logo -->

						<div class="mu-hero-featured-content">
							<h1><?php echo '<a  style="color:white;"href="'.$row['url'].'">';
                 					echo $row['number'];?>
          																
						rd ACM/ SIGAPP Symposium On Applied Computing</h1>
					        <h1 class="heading"><?php echo '<a href="'.$row['url'].'"target="_blank" style="color: white;">' ?>ACM SAC <?php echo $row['year'];
          ?></a></h1>
				                
                                                        
							<h2>Track on Cloud Computing</h2>

					<p class="mu-event-date-line"> <?php $month1 = date('F', strtotime($row['start_date']));
                $month2 = date ('F', strtotime($row['end_date']));
                $date1 = date("d", strtotime($row['start_date']));
                $date2 = date("d", strtotime($row['end_date'])); 
           if($month1==$month2){     
            echo $date1.' - '.$date2. ' ' .$month1 .', '.$row["year"]. '.' .$row['city'].", ".$row['country'];
          }
          else
              {
                echo $date1. ' '.$month1.' - '.' '.$date2.' '.$month2.', '.$row["year"]. '.' .$row['city'].", ".$row['country'];
              }
            ?>
		

							

							  </p>

							<!--<div class="mu-event-counter-area">
								<div id="mu-event-counter">
									
								</div>
							</div> -->

						</div>
					</div>
					<!-- End hero featured area -->

				</div>
			</div>
		</div>
	</header>
	<!-- End Header -->
	
	<!-- Start main content -->
	<main role="main">

                <!-- Start Quick Links -->
                       <section id="mu-importantDates">
			<div class="container">
				<div class="row">
					<div class="colo-md-12">
						<div class="mu-importantDates-area">

							<div class="mu-title-area">
								<h2 class="mu-title">Important Dates</h2>
								 <?php
                                                                    $sql="SELECT * FROM Important_dates WHERE year='$inputyear'";
                                                                    $result = mysqli_query($conn,$sql);
                                                                    while($datesrow = mysqli_fetch_array($result))
                                                                     {
                                                                       echo '<p>'.$datesrow['activity'].' : '.$datesrow['start_date'].'</p><br>';
                                                                     }
                                                                    $sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
                                                                    $result = mysqli_query($conn,$sql);
                                                                    $sponrow=mysqli_fetch_array($result);
?>
							</div>

							
							
						</div>
					</div>
				</div>
			</div>
		</section>
              
           


    
                <!-- End Quick Links -->






		<!-- Start About -->
		<section id="mu-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-about-area">
							
									       <div class="mu-title-area">
										<h2>About The Conference</h2>
                                                                               </div>
										<?php
        $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='home'";
          $result = mysqli_query($conn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p>";
          
      ?>

										
							
							

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End About -->

		

		<!-- Start proceedings  -->
		<section id="mu-proceedings">
			<div class="container">
				<div class="row">
					<div class="colo-md-12">
						<div class="mu-proceedings-area">

							<div class="mu-title-area">
								<h2 class="mu-title">proceedings Detail</h2>
								 <?php
                                                                   $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='proceedings'";
                                                                   $result = mysqli_query($conn,$sql);
                                                                   $pararow = mysqli_fetch_array($result);
                                                                   echo '<p style="text-align: justify;">'.$pararow['para'];
          
      
                                                                   echo ' Final Camera-ready submissions must follow the template available at link <b><a href="https://www.sigapp.org/sac/" target="_blank">HERE</a>.</p>'

                                                                  ?>
							</div>

							
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End proceedings -->
                

		<!-- Start trackTopics -->
		<section id="mu-trackTopics">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-trackTopics-area">

							<div class="mu-title-area">
								<h2 class="mu-title">Track Topics</h2>
								<p style="text-align: justify;">
<?php
                                                                 $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='topics'";
          $result = mysqli_query($conn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p><br>"; ?>
                                                                </p> <br>
  <!-- <ul>-->
   <?php
     $sql="SELECT t.tname FROM Topics as t, Topics_Year as y WHERE y.tid=t.tid and y.year='$inputyear'";
$result = mysqli_query($conn,$sql);


while($topicrow = mysqli_fetch_array($result))
{
echo "<p>" . $topicrow['tname'] . "</p>";
}?>
   <!--</ul>--><br>
 <!--<p style="text-align: justify;">This track welcomes theoretical models, algorithms, practical results, description and analysis of experiments and demonstrations of working prototypes of cloud computing applications. Your paper needs to be submitted to the track chairs.</p>  -->
							</div>

							

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End trackTopics -->

		<!-- Start paperSubmission -->
		<section id="mu-paperSubmission">
			<div class="mu-paperSubmission-area">
                           <div class="mu-title-area">
			     <h2 class="mu-title">Paper Submission</h2>
                                 <div class="mu-title-area">
								<h4 class="mu-title">Submission Guidelines</h4>
								<?php $sql="SELECT url FROM Submission_link WHERE year='$inputyear'";
                  $result = mysqli_query($conn,$sql);
                $linkrow = mysqli_fetch_array($result)?>
            <!--<h6 style="text-transform: capitalize; text-align: center;">Paper Submission</h6><br> -->
            <p style="text-align: justify;">
               <?php
        $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='submission'";
          $result = mysqli_query($conn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p>";
      ?>

            </p> 
        <!--    <p style="text-align: justify;">Full paper size is limited to 6 pages according to the above mentioned template, being allowed a maximum of 2 extra pages at the additional cost of 80 USD per extra page. Poster papers are limited to 2 pages and no additional pages are permitted. A few key words should be provided. A paper cannot be sent to more than one track. Original manuscripts (regular papers) should be submitted in electronic format through the START Conference manager web site :<br> <?php echo '<a href="'.$linkrow['url'].'" target="_blank">'.$linkrow['url'].'</a>'?></p>
            <p>Abstracts for the Student Research Competition (SRC) should be submitted in electronic format through the START Conference manager web site : <br><?php echo '<a href="'.$linkrow['url'].'" target="_blank">'.$linkrow['url'].'</a>'?></p> -->
              <br><br>
							</div>
                               <div class="mu-title-area">
								<h4 class="mu-title">Important notice</h4>
								   <p style="text-align: justify;">Paper registration is required, allowing the inclusion of the paper/poster in the conference proceedings. An author or a proxy attending SAC MUST present the paper. This is a requirement for the paper/poster to be included in the ACM/IEEE digital library. No-show of scheduled papers and posters will result in excluding them from the ACM/IEEE digital library.</p>
							</div>





                           </div>
			        
	                  
			</div>
		</section>
		<!-- End paperSubmission -->

		<!-- Start chairs  -->
		<section id="mu-chairs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-chairs-area">

							<div class="mu-title-area">
								<h2 class="mu-title">Chairs</h2>
								
							</div>

							<!-- Start chairs Content -->
							<div class="mu-chairs-content">

								<div class="mu-chairs-slider">

									

									<?php
     $sql="SELECT c.* FROM Chairs as c, Chairs_Year as y WHERE y.cid=c.cid and y.year='$inputyear'";
     $result = mysqli_query($conn,$sql);


while($chairrow = mysqli_fetch_array($result))
{
									
									echo '<div class="mu-single-chairs">' ;
										
										echo '<div class="mu-single-chairs-info">';
											echo "<h3>".$chairrow['cname']."</h3>";
											if(!empty($chairrow['designation']))
  {  echo "<br>".$chairrow['designation'];
  }
  if(!empty($chairrow['department']))
  {
    echo "<br>".$chairrow['department'];
  }
  if(!empty($chairrow['institute']))
  {
    echo "<br>".$chairrow['institute'];
  }
  if(!empty($chairrow['city']))
  {
    echo " , ".$chairrow['city'];
  }
  if(!empty($chairrow['state']))
  {
    echo "<br> ".$chairrow['state'];
  }
  if(!empty($chairrow['pin']))
  {
    echo  " - ".$chairrow['pin'];
  }
  if(!empty($chairrow['country']))
  {
    echo  " , ".$chairrow['country'];
  }
  if(!empty($chairrow['email']))
  {
    echo  "<br>".$chairrow['email'];
  }
  if(!empty($chairrow['phone']))
  {
    echo  "<br>Phone : ".$chairrow['country_code']." ".$chairrow['phone'];
  }
  if(!empty($chairrow['country']))
  {
    echo  "<br>Fax : ".$chairrow['country_code']." ".$chairrow['fax'];
  }
											
										echo '</div>';
									echo '</div>';
									echo '<!-- End single speaker -->';

}?>	
								</div>
							</div>
							<!-- End chairs Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End chairs -->

		<!-- Start programCommittee  -->
		<section id="mu-programCommittee">
			
			
		
			<div class="container">
				<div class="row">
					<div class="colo-md-12">
						<div class="mu-programCommittee-area">

							<div class="mu-title-area">
								<h2 class="mu-title">Program Committee</h2>
								 <!--<ul>-->
  <?php  
    $sql="SELECT p.pname, p.country FROM Program_committee as p, Program_committee_Year as y WHERE y.pid=p.pid and y.year='$inputyear'";
  $result = mysqli_query($conn,$sql);


while($progrow = mysqli_fetch_array($result))
{
echo "<p>" . $progrow['pname'] . ", ".$progrow['country']."</p>";
}

?>
   <!--</ul>-->
							</div>

							
							
						</div>
					</div>
				</div>
			</div>
		</section>
		</section>
		<!-- End programCommittee -->

		<!-- Start archives -->
		<section id="mu-archives">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-archives-area">

							<div class="mu-title-area">
								<h2 class="mu-title">Archives</h2>
								<!--<ul>-->
    <?php
    $limityear=2017;  
    $sql="SELECT year, temp_no FROM Info WHERE year>'$limityear' and year<='$inputyear'";
  $result = mysqli_query($conn,$sql);


while($archrow = mysqli_fetch_array($result))
{
echo '<li><a href="../template_'.$archrow['temp_no'].'/home.php?year='.$archrow['year'].'" target="_blank" style="color:#00BCD4">Year '.$archrow['year'].'</a></li>';
}

?>  
      <li><a href="http://www.nitc.ac.in/sac/sac2017/cc.htm" target="_blank" style="color:#00BCD4">Year 2017</a></li>
        <li><a href="http://www.nitc.ac.in/sac2018/bisite.usal.es/sac2016/cc/" target="_blank" style="color:#00BCD4">Year 2016</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2014/cc.htm" target="_blank" style="color:#00BCD4">Year 2014</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2013/cc.htm" target="_blank" style="color:#00BCD4">Year 2013</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2012/cc.htm" target="_blank" style="color:#00BCD4">Year 2012</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac_2011/" target="_blank" style="color:#00BCD4">Year 2011</a></li>
        <li><a href="http://www.nitc.ac.in/sac/sac2010/cc.htm" target="_blank" style="color:#00BCD4">Year 2010</a></li>
   <!-- </ul>-->
							</div>

							

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End archives -->

		


		
			
	<!-- Start footer -->
	<footer id="mu-footer" role="contentinfo">
			<div class="container">
				<div class="mu-footer-area">
					<!--<div class="mu-footer-top">
						<div class="mu-social-media">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-youtube"></i></a>
						</div>
					</div> -->
					<div class="mu-footer-bottom">
						<!--<p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>-->
					</div>
				</div>
			</div>

	</footer>
	<!-- End footer -->

	
	
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <!-- Event Counter -->
    <script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets/js/app.js"></script>
  
       
	
    <!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>

	
	
    
  </body>
</html>
