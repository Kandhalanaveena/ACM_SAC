 <?php
 require 'session.php';
 require '../open.php';
 $year=$_SESSION['edit_year'];

$conn=$dbConn;
$name=$_POST['mem_name'];
$country=$_POST['country'];
if(!(empty($name)) && !(empty($country)))
{
$name=trim($name);
$country=trim($country);
$name=ucwords(strtolower($name));
$country=ucwords(strtolower($country));
$pastpid=$_POST['pid'];

$sql="INSERT into Program_committee (pname, country) 
VALUES ('$name', '$country')";

$result=mysqli_query($conn, $sql);

$sql="INSERT into Program_committee_Year (pid, year)
SELECT pid, "."'".$year."'"." FROM Program_committee WHERE pname='$name' and country='$country'";
$result=mysqli_query($conn, $sql);


$sql="SELECT pid FROM Program_committee WHERE pname='$name' and country='$country'";

$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_array($result);
	$newpid=$row['pid'];
	$sql="UPDATE Program_committee_Year SET pid='$newpid' where pid='$pastpid' and year<>'$year'";
	$result=mysqli_query($conn, $sql);
}

$sql="DELETE FROM Program_committee_Year WHERE pid='$pastpid' and year='$year'";
$result = mysqli_query($dbConn, $sql);

$sql="DELETE from Program_committee Where pid='$pastpid'";
$result=mysqli_query($conn, $sql);
}

require '../close.php';

 header("Location:prog_members.php");  

?>
