 <?php
 require 'session.php';
require '../open.php'; 

// define variables and set to empty values

$temp_no=$_SESSION['create_tempno'];
$year=$_SESSION['create_year'];


$name=$_POST['mem_name'];
$country=$_POST['country'];
if(!(empty($name)) && !(empty($country)))
{
$name=trim($name);
$country=trim($country);
$name=ucwords(strtolower($name));
$country=ucwords(strtolower($country));


$sql="INSERT into Program_committee (pname, country) 
VALUES ('$name', '$country')";

$result=mysqli_query($dbConn, $sql);

$sql="INSERT into Program_committee_Year (pid, year)
SELECT pid, "."'".$year."'"." FROM Program_committee WHERE pname='$name' and country='$country'";
$result=mysqli_query($dbConn, $sql);
}
 header("Location:prog_members.php");
     
?>


<?php
require '../close.php';
?>