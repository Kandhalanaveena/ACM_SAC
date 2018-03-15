<?php
session_start();
if(!isset($_SESSION['uid'])) {
    // session isn't started
     header("Location:index.html"); 

}

?>