 <?php


$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
$year=2018;
// Create connection


$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "connection established<br>";



$topic=$_POST['tt_name'];
$tid=$_POST['tid'];

$sql="INSERT into Topics (tname) 
VALUES ('$topic')";

$result=mysqli_query($conn, $sql);

$sql="INSERT into Topics_Year (tid, year)
SELECT tid, "."'".$year."'"." FROM Topics WHERE tname='$topic'";
$result=mysqli_query($conn, $sql);

$sql="DELETE FROM Topics_Year WHERE tid='$tid' and year='$year'";
  $result = mysqli_query($conn, $sql); 

mysqli_close($conn);

 header("Location:track_topics.php");
     

?>
