<?php
session_start();
if(!isset($_SESSION['uid'])) {
    // session isn't started
     header("Location:../index.html"); 

}
else if(!isset($_SESSION['create_tempno'])) {
    // session isn't started
    //echo "tempno";
    header("Location:../create.php"); 

}
else if(!isset($_SESSION['create_year'])) {
    // session isn't started
    header("Location:../create_year.php"); 
	//echo "year";
}

?>