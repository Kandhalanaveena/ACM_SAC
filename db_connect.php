 <?php
 require 'open.php';
 


$username=$_POST['username'];
$password=$_POST['pwd'];
$sql="SELECT * FROM Admin WHERE username='$username' AND password=SHA1('$password')";
$result=mysqli_query($dbConn, $sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {
	    
      $row=mysqli_fetch_array($result);
      
      session_start();
      $_SESSION['uid']=$row['uid']; 
    header("Location:home.php");
    exit;
    }
  else {
	 //echo "failure<br>";
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";

	  header("Location:index.html");
    exit; }

 }
else {
    echo "Error  ".mysqli_error($dbConn)."<br>";

    }

require 'close.php';

?>
