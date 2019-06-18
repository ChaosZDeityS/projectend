<?php
$servername = "http://35.240.189.87";
$username = "root";
$password = "RkN2NvRSiiwo";
//$password = "RkN2NvRSiiwo";
$dbname = "busproject";
//$port ="3306" ; 

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname,$port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>