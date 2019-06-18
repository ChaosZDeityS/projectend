<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "busproject";
$num = 1; 
$datereg = date("Y-m-d");
date_default_timezone_set("Asia/Bangkok");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($num <= 4 && $num >= 1){
        while($num <= 4){
            $sql = "INSERT INTO regisdriver (busno, datereg)
            VALUES ('$num', '$datereg')";   
            $conn->exec($sql);
            $num++;
        }
        }
    }

   
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>