<html>

<?php

require 'session.php';
require '../open.php'; 

// define variables and set to empty values
$temp_no=$_SESSION['create_tempno'];
$year=$_SESSION['create_year'];

$name= basename($_FILES['file']['name']);

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['Upload'];



if(isset($name) && !empty($name)){

    $position= strrpos($name, "."); 
    $fileextension= substr($name, $position + 1);
    $fileextension= strtolower($fileextension);
    $path= '../pdf/';
	$target_file = $path.'2018.pdf';
    if ( $fileextension=='pdf'){
		if (move_uploaded_file($tmp_name, $target_file)) {
			$sql="INSERT INTO Files_table (year, pdf_name)
				VALUES ('$year', '$name')";

			$result = mysqli_query($dbConn, $sql);

			if($result)
			{ 
    			echo '<script type="text/javascript">
    			alert("File uploaded successfully !!");
    			window.location.href="back_image.php";
    			</script>';

    			
			}
			else
			{
				//echo 'Sorry, not inserted into database';
				echo '<script type="text/javascript">
    			alert("File not uploaded. Try again !!");
    			window.location.href="call_for_papers.php";
    			</script>';
			}	
	    	
		}
		else
		{
			echo 'file can not be uploded';
		}
	}
	else
	{
		echo 'file type is not pdf';
	}	


}
else
{
	echo "file is empty";

}

require '../close.php';
?>

</html>