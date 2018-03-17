<?php
require '../open.php'; 
?>

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
		
		$inputyear=$_GET['year'];	
		$sql="SELECT * FROM Info WHERE year='$inputyear'";
		$result = mysqli_query($dbConn,$sql);


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
			      		<li><a href="home.php?year=<?php echo $inputyear?>#mu-hero">Home</a></li>
                                       <li><a href="home.php?year=<?php echo $inputyear?>#mu-importantDates">Dates</a></li>
				        <li><a href="home.php?year=<?php echo $inputyear?>#mu-about">About</a></li>
				        <li><a href="home.php?year=<?php echo $inputyear?>#mu-proceedings">Proceedings</a></li>
			            <li><a href="home.php?year=<?php echo $inputyear?>#mu-trackTopics">Track Topics</a></li>
			            <li><a href="home.php?year=<?php echo $inputyear?>#mu-paperSubmission">Paper Submission</a></li>
			            <li><a href="home.php?year=<?php echo $inputyear?>#mu-chairs">Chairs</a></li>
			            <li><a href="home.php?year=<?php echo $inputyear?>#mu-programCommittee">Committee</a></li>
			            <li><a href="home.php?year=<?php echo $inputyear?>#mu-archives">Archives</a></li>
			      	</ul>
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
		</nav>
		<!-- End menu -->
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
			echo '<div class="mu-hero-overlay" style="background-image:url('."'../background_images/".$imagename."'".');">';
			      }
			      else
			      {
				echo '<div class="mu-hero-overlay" style="background-image:url('."'images/NIT-Calicut.jpg');".'">'; 
				} ?> 
		<!--<div class="mu-hero-overlay"> -->
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

              
                         <?php
				$sql= "SELECT * FROM Gallery WHERE year='$inputyear'";


				$result = mysqli_query($dbConn, $sql); 
				     
				if ($result && mysqli_num_rows($result)>0)
				{
				  $length=mysqli_num_rows($result);

				echo '<div class="fh5co-gallery">'; 
				echo '<div id="gallery">';
				echo '<figure>';
				echo '<div class="mu-title-area">';
				echo '<br><br><br><br><h2 class="mu-title">Gallery</h2><br><br>';
                                echo "</div>";
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
				   echo '<li class="gallery-item" style="align:center"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
				    $iter=$iter+1;
				 }
				 if($iter<=$length)
				  {
				   $imagerow=mysqli_fetch_array($result);
				   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
				   echo '<li class="gallery-item" style="align:center"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
				    $iter=$iter+1;
				 }
				 if($iter<=$length)
				  {
				   $imagerow=mysqli_fetch_array($result);
				   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
				   echo '<li class="gallery-item" style="align:center"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
				    $iter=$iter+1;
				 }
				 if($iter<=$length)
				  {
				   $imagerow=mysqli_fetch_array($result);
				   $imageurl="../gallery/".$inputyear."/".$imagerow['imagename'];
				   echo '<li class="gallery-item" style="align:center"><a href="'.$imageurl.'" download=""><img src="'.$imageurl.'" alt="" style="width: 750px; height:220px;"></a></li>';
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
