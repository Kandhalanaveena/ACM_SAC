 <?php

require 'session.php';
require '../open.php'; 

// define variables and set to empty values

$temp_no=$_SESSION['create_tempno'];
$year=$_SESSION['create_year'];

$topic=$_POST['tt_name'];
if(!(empty($topic)))
{
$topic=trim($topic);
$topic=ucwords(strtolower($topic));


$sql="INSERT into Topics (tname) 
VALUES ('$topic')";

$result=mysqli_query($dbConn, $sql);

$sql="INSERT into Topics_Year (tid, year)
SELECT tid, "."'".$year."'"." FROM Topics WHERE tname='$topic'";
$result=mysqli_query($dbConn, $sql);
}
header("Location:track_topics.php");
?>

<?php
require '../close.php';
?>