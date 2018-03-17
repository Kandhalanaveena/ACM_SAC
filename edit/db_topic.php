 <?php
require 'session.php';
require '../open.php';
$year=$_SESSION['edit_year'];
$conn=$dbConn;



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
