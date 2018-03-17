<?php
session_start();
if(!isset($_SESSION['uid'])) {
    // session isn't started
     header("Location:../index.html"); 

}
if(!isset($_SESSION['edit_year'])) {
    // session isn't started
     header("Location:../edit_year.php"); 

}

?>