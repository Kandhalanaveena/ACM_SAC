<?php

require 'session.php';
require '../open.php'; 

// define variables and set to empty values
$temp_no=$_SESSION['create_tempno'];
$year=$_SESSION['create_year'];

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['Upload'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);



if (isset($name)) {

$path= '../pdf/';

	if (!empty($name)){
	if (move_uploaded_file($tmp_name, $path.$name)) {
	echo 'Uploaded!';

	}
	}
}


$sql="INSERT INTO Files_table (year, pdf_name)
VALUES ('$year', '$name')";

$result = mysqli_query($dbConn, $sql);

if($result)
{
  header("Location:call_for_papers.php");
}

?>

<?php
require '../close.php';
?>