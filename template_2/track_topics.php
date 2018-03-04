<!DOCTYPE HTML>
<html>
<head>
<?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
$year=2018;
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="SELECT * FROM Info WHERE year='$year'";
$result = mysqli_query($conn,$sql);


$row = mysqli_fetch_array($result);
echo "<title>ACM SAC ".$row[year]."</title>"
?>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">textured<span class="logo_colour">blue</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
           <li><a href="home.php">Home</a></li>
          <li><a href="home.php">Proceedings</a></li>
          <li class="selected"><a href="track_topics.php">Track Topics</a></li>
          <li><a href="prog_members.php">Program committee</a></li>
          <!--<li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>-->
        </ul>
      </div>
    </div>
    <div id="site_content">
    <div id="content">
    <h2>Track Topics</h2>
   <ul>  
<?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
$year=2018;
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="SELECT t.tname FROM Topics as t, Topics_Year as y WHERE y.tid=t.tid and y.year='$year'";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result))
{
echo "<li>" . $row['tname'] . "</li>";
}

?>
   <!--
   <li>Virtualization of the infrastructure</li>
   <li>Performance of cloud systems and applications- Cloud Availability and Reliability</li>
   <li>Elasticity in clouds</li>
   <li>Storage virtualization</li>
   <li>Green computing models for clouds</li>
   <li>Energy aware data storage, computation, scheduling, monitoring, auditing in cloud computing</li>
   <li>Programming models for clouds</li>
   <li>Cloud computing for the mobile world</li>
   <li>Threat handling and security issues in clouds</li>
   <li>QoS for applications on clouds</li>
    <li>Optimization and performance issues on clouds</li>
    <li>Communication protocols for clouds</li>
    <li>Databases for clouds</li>
    <li>Security in clouds</li>

-->
   </ul>
   </div>
   </div>
    <div id="footer">
      Copyright &copy; textured_blue | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Free CSS Templates</a>
    </div>
  </div>
</body>
</html>
