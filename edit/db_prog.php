 <?php
 require 'session.php';
 require '../open.php';
 $year=$_SESSION['edit_year'];

$conn=$dbConn;

$isedit=$_POST['isedit'];
$name=$_POST['mem_name'];
$country=$_POST['country'];

if(!(empty($name)) && !(empty($country)))
{
$name=trim($name);
$country=trim($country);
$name=ucwords(strtolower($name));
$country=ucwords(strtolower($country));

if($isedit==1) 
    {
   			$prev_pid=$_POST['edit_pid'];

   			$sql="UPDATE  Program_committee  SET pname='$name', country='$country' WHERE pid='$prev_pid'";
   			$result = mysqli_query($dbConn, $sql);	
			
	  }
	else if($isedit==0)
	 {
        $sql="INSERT into Program_committee (pname, country) 
				VALUES ('$name', '$country')";
		$result = mysqli_query($dbConn, $sql);

		$sql="INSERT into Program_committee_Year (pid, year)
			SELECT pid, "."'".$year."'"." FROM Program_committee WHERE pname='$name' and country='$country'";
		$result=mysqli_query($conn, $sql);	
	}

}


require '../close.php';
 header("Location:prog_members.php");  

?>
