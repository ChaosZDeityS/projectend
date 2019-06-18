<?php
    // header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *"); 
    header('Access-Control-Allow-Headers: Origin, Content-Type'); 
    header('Access-Control-Allow-Headers: Content-Type,X-Custom-Header'); 
    header('Content-type: application/json');


    // include('config.ini.php');

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    // $id = $_POST["null"];
    // $ReqDown = $_POST["emergency2"];
    date_default_timezone_set("Asia/Bangkok");
    $busno = $_POST["Busno"];
    $status = $_POST["Status"];

    $host="localhost";
	$username="root";
	$password="";
    $DBname="busproject";
    
    $timeend = date("H:i:s");
    
	
	
	$con=mysqli_connect($host,$username,$password,$DBname);
    // mysqli_set_charset($con,'utf8');
    if($con->connect_error){
        die("connection failed: " . $con->connect_error);
    }

    $sql ="SELECT busno,timestart,timeend FROM regisdriver WHERE busno = '$busno' AND timestatus = 1 ";
    $sql2 = "UPDATE regisdriver SET timeend = '$timeend' , timestatus = 2 WHERE busno = '$busno' AND timestatus = 1 LIMIT 1";

    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) == 0) {
        // require_once 'busqueue.php'; 
    } else {
    
    }
    $result2 = mysqli_query($con,$sql2);
    
    // $sql1 = 'INSERT INTO regisdriver(regisno,busno,datereg,timestart,timeend,timestatus)
    // VALUES("' . null . '","' . $busno .'","' . date("Y-m-d") . '","' . null . '","' . $timeend . '","' . $status . '")';

    // $sql1 = "UPDATE regisdriver SET timeend = '$timeend' , timestatus = 2 WHERE busno = '$busno' AND timestart = 1 LIMIT 1";

    // $result = mysqli_query($connection,$sql); 


    // if($con->query($sql1) === TRUE){
    //     $outp = "Inserted" . null . "," . $busno ."," . date("Y-m-d") . "," . null . "," . $timeend . "," . $status  ;
    //     echo json_encode($outp);
    // }else{
    //     echo json_encode("Error: ". $sql1. "<br>" . $con->error);
    // }
	// // if($con){
    // //     echo "work";
    // //     // echo $_POST;
	// // }
	// // else{
	// // 	echo "not work";
    // // }
    // $con->close();

    

?>