 <?php
$servername = "Localhost";
$username = "b140622cs";
$password = "b140622cs";
$dbname="db_b140622cs";
// Create connection


$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."<br>");
}

echo "connection established<br>";


$sql="CREATE TABLE Admin 
( uid int NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL UNIQUE, 
password VARCHAR(50) NOT NULL,
email VARCHAR(100),
mobile VARCHAR(20),
fname VARCHAR(20),
lname VARCHAR(20),
PRIMARY KEY(uid));";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "admin table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }
    
    
    
$sql="INSERT INTO Admin (username, password) VALUES ('admin', SHA1('acmsac'));";
$result=mysqli_query($conn, $sql);

if ($result) 
   {
    echo "admin table insertion successfull<br>";
   
    }
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }  
    
    
 $sql="CREATE TABLE Topics 
( tid int NOT NULL AUTO_INCREMENT, 
tname VARCHAR(500) NOT NULL UNIQUE,
 PRIMARY KEY (tid));";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "topics table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }
    
$sql="CREATE TABLE Topics_Year 
( tid int NOT NULL, 
  year int NOT NULL, 
  PRIMARY KEY (tid, year),
  CONSTRAINT fk_topics FOREIGN KEY (tid)
  REFERENCES Topics(tid)
  ON DELETE CASCADE
  ON UPDATE CASCADE );";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "topics_year table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }  
    
$sql="CREATE TABLE Chairs 
( cid int NOT NULL AUTO_INCREMENT, 
  cname VARCHAR(500) NOT NULL UNIQUE, 
  designation VARCHAR(100), 
  department VARCHAR(500), 
  institute VARCHAR(500),
   city VARCHAR(100), 
   pin int, 
   country VARCHAR(100), 
   email VARCHAR(250),
   country_code VARCHAR(5),
   phone int,
   fax int,
   PRIMARY KEY(cid));";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Chairs table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }    
 
 
$sql="CREATE TABLE Chairs_Year 
( cid int NOT NULL,
 year int NOT NULL, 
 PRIMARY KEY (cid, year),
 CONSTRAINT fk_chairs FOREIGN KEY (cid)
  REFERENCES Chairs(cid)
  ON DELETE CASCADE
  ON UPDATE CASCADE);";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "chairs_year table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    } 


$sql="CREATE TABLE Program_committee 
( pid int NOT NULL AUTO_INCREMENT, pname VARCHAR(500) NOT NULL UNIQUE, country VARCHAR(100) NOT NULL, PRIMARY KEY (pid),
 CONSTRAINT PC_unique UNIQUE (pname,country));";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Program_committee table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }
    
$sql="CREATE TABLE Program_committee_Year 
( pid int NOT NULL, 
  year int NOT NULL, 
  PRIMARY KEY (pid, year),
  CONSTRAINT fk_program_committee FOREIGN KEY (pid)
  REFERENCES Program_committee(pid)
  ON DELETE CASCADE
  ON UPDATE CASCADE);";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Program_committee_year table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }  
 
           
mysqli_close($conn);


echo "connection closed<br>";
?>
