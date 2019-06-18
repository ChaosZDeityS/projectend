<?php
require_once 'connect.php' ;
date_default_timezone_set("Asia/Bangkok");
$busno = $_REQUEST['busno'] ; 
$datereg = date("Y-m-d");
$timestart = date("H:i:s");

$sql ="SELECT busno,timestart,timeend FROM regisdriver WHERE busno = '$busno' AND timestatus = 0 ";
$sql2 = "UPDATE regisdriver SET timestart = '$timestart' , timestatus = 1 WHERE busno = '$busno' AND timestatus = 0 LIMIT 1";

$result = mysqli_query($connection,$sql); 

 

if(mysqli_num_rows($result) == 0) {
    require_once 'busqueue.php'; 
    $result2 = mysqli_query($connection,$sql2);
} else {
    $result2 = mysqli_query($connection,$sql2);
}

?>