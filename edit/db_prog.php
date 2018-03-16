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



$name=$_POST['mem_name'];
$country=$_POST['country'];
if(!(empty($name)) && !(empty($country)))
{
$name=trim($name);
$country=trim($country);
$name=ucwords(strtolower($name));
$country=ucwords(strtolower($country));
$pid=$_POST['pid'];


$sql="UPDATE Program_committee SET pname='$name', country='$country' where pid='$pid'";

$result=mysqli_query($conn, $sql);
}

mysqli_close($conn);

 header("Location:prog_members.php");
     

?>
