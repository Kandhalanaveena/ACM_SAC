 <?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
// Create connection


$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "connection established<br>";



$username=$_POST['username'];
$password=$_POST['pwd'];
$sql="SELECT * FROM Admin WHERE username='$username' AND password=SHA1('$password')";
$result=mysqli_query($conn, $sql);
if ($result) {
  if (mysqli_num_rows($result) > 0) {
	    
      $row=mysqli_fetch_array($result);
      session_start();
      $_SESSION['id']=$row['uid']; 
    header("Location:home.php");
    exit;
    }
  else {
	 //echo "failure<br>";
	  header("Location:index.html");
    exit; }

 }
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }

mysqli_close($conn);
?>
