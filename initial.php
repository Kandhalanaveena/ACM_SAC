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
   state VARCHAR(100), 
   pin int, 
   country VARCHAR(100), 
   email VARCHAR(250),
   country_code VARCHAR(5),
   phone VARCHAR(20),
   fax VARCHAR(20),
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
( pid int NOT NULL AUTO_INCREMENT, pname VARCHAR(500) NOT NULL, country VARCHAR(100) NOT NULL, PRIMARY KEY (pid),
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
 
$sql="CREATE TABLE Info 
( year int NOT NULL UNIQUE, 
  number int NOT NULL UNIQUE,
  city VARCHAR(50) NOT NULL,
  country VARCHAR(50) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  url VARCHAR(200),
  temp_no int,
  PRIMARY KEY (year));";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Info table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }  
 
$sql="CREATE TABLE Hosted_by 
( university_name TEXT NOT NULL, 
  country VARCHAR(50) NOT NULL,
   url VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci',
  year int NOT NULL
 );";
$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Hosted_by table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    } 

$sql="CREATE TABLE Sponsored_by 
( sponsor_name VARCHAR(100) NOT NULL,
  url VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci', 
  year int NOT NULL
 );";

$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Sponsored_by table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }  

$sql="CREATE TABLE Submission_link 
( url VARCHAR(512) CHARACTER SET 'ascii' COLLATE 'ascii_general_ci' NOT NULL, 
  year int NOT NULL UNIQUE
 );";

$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Submission_link table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    } 

$sql="CREATE TABLE Important_dates 
( activity VARCHAR(500),
  start_date DATE NOT NULL, 
  year int NOT NULL
 );";

$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Important_dates table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }   


$sql="CREATE TABLE Paras 
( paraid int NOT NULL AUTO_INCREMENT,
  para TEXT NOT NULL,
  type VARCHAR(20) NOT NULL, 
  year int NOT NULL,
  PRIMARY KEY (paraid)
 );";

$result=mysqli_query($conn, $sql);

if ($result) {
    echo "Paras table creation successfull <br>";
    
}
else {
    echo "Error  ".mysqli_error($conn)."<br>";
    }



mysqli_close($conn);


echo "connection closed<br>";
?>
