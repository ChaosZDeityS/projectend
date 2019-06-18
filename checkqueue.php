<?php
require_once 'connect.php' ;
date_default_timezone_set("Asia/Bangkok");
$busno = 3 ; 
$datereg = date("Y-m-d");

$timeend = date("H:i:s");

$sql ="SELECT busno,timestart,timeend FROM regisdriver WHERE busno = '$busno' AND timestatus = 1 ";
$sql2 = "UPDATE regisdriver SET timeend = '$timeend' , timestatus = 2 WHERE busno = '$busno' AND timestatus = 1 LIMIT 1";

$result = mysqli_query($connection,$sql); 
$result2 = mysqli_query($connection,$sql2);
 

if(mysqli_num_rows($result) == 0) {
    require_once 'busqueue.php'; 
} else {
  
}

?>