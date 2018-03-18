<html>

<?php

require 'session.php';
require '../open.php'; 

// define variables and set to empty values
$year=$_SESSION['edit_year'];

$name= basename($_FILES['file']['name']);

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['Upload'];



if(isset($name) && !empty($name)){

    $position= strrpos($name, "."); 
    $fileextension= substr($name, $position + 1);
    $fileextension= strtolower($fileextension);
    $path= '../pdf/';
	$target_file = $path.$year.'.pdf';
    if ( $fileextension=='pdf'){
		if (move_uploaded_file($tmp_name, $target_file)) {
			$name=$year.'.pdf';
			$sql="UPDATE Files_table SET year='".$year."', pdf_name='".$name."' WHERE year='$year'";

			$result = mysqli_query($dbConn, $sql);

			if($result)
			{ 
    			echo '<script type="text/javascript">
    			alert("File uploaded successfully !!");
    			window.location.href="back_image.php";
    			</script>';

    			
			}
				
	    	
		}
		else
		{
			
			echo '<script type="text/javascript">
    			alert("File can not be uploaded. Try again !!");
    			window.location.href="call_for_papers.php";
    			</script>';
		}
	}
	else
	{
		
		echo '<script type="text/javascript">
    			alert("File type is not pdf. Try again !!");
    			window.location.href="call_for_papers.php";
    			</script>';
	}	


}
else
{
	
	echo '<script type="text/javascript">
    			alert("Empty file name. Try again !!");
    			window.location.href="call_for_papers.php";
    			</script>';

}

require '../close.php';
?>

</html>