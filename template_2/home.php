<!DOCTYPE HTML>
<html>

<head>
<?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
$inputyear=2018;
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
echo "<title>ACM SAC ".$row['year']."</title>"
?>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main" >
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          
          <h1 style="font-size: 22px">
          <?php echo '<a href="'.$row['url'].'">';
                 echo $row['number']
          ?>rd ACM/ SIGAPP <span class="logo_colour">Symposium On Applied Computing</span></a>
          </h1>
          <h1 style="font-size: 22px">
          <?php echo '<a href="'.$row['url'].'">';
          ?>ACM-SAC <span class="logo_colour"><?php echo $row['year']
          ?></span></a>
          </h1>
         <h2 style="font-size: 17px">Track on Cloud Computing</h2>
          <h2 style="font-size: 17px"> <span class="logo_colour"> <?php echo $row['city'].", ".$row['country'];
          ?></span></h2>
          
        </div>
      </div>
        <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="">Home</a></li>
          <li><a href="">Proceedings</a></li>
          <li><a href="track_topics.php">Track Topics</a></li>
          <li><a href="prog_members.php">Program committee</a></li>
          <!--<li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>-->
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Quick Links</h3>
        <h4>Important Dates</h4>
        
        <p>2013 sees the redesign of our website. Take a look around and let us know what you think.</p>
        <h5>August 1st, 2013</h5>
        <p></p>
        <h4>Call For Papers</h4>
       
        <p>2013 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4</a></li>
        </ul>
       
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>ACM SAC <?php echo $row['year'];
          ?></h1>

          <p>For the past <?php echo $row['number'];
          ?> years, the ACM Symposium on Applied Computing has been a primary gathering forum for applied computer scientists, computer engineers, software engineers, and application developers from around the world. SAC <?php echo $row['year'];
          ?> is sponsored by the ACM Special Interest Group on Applied Computing (SIGAPP), and is <b>hosted by</b></p>
          <ul>  
          <?php
          $sql="SELECT * FROM Hosted_by WHERE year='$inputyear'";
          $result = mysqli_query($conn,$sql);


while($hostrow = mysqli_fetch_array($result))
{
echo '<li><a href="'.$hostrow['url'].'" target="_blank">'.$hostrow['university_name'].", ".$hostrow['country']."</a></li>";
}
$sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
$result = mysqli_query($conn,$sql);
$sponrow=mysqli_fetch_array($result);
?>
</ul>

<p><b>The SRC Program is sponsored by</b></p>
<h1 style="font-size: 22px">
          <?php echo '<a href="'.$sponrow['url'].'" target="_blank">';
          ?><?php echo $sponrow['sponsor_name']
          ?></a>
          </h1>

      </div>
    </div>
    <div id="footer" >
      
    </div>
  </div>
</body>
</html>
