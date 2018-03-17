<?php
require 'session.php';
$temp_no=$_GET['number'];
$_SESSION['create_tempno']=$temp_no;
header("Location:create_year.php");
?>