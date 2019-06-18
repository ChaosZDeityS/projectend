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
    $busno = $_POST["busno"];
    $status = $_POST["status"];

    $host="localhost";
	$username="root";
	$password="";
    $DBname="busproject";
    
    $timestart = date("H:i:s");
	
	
	$con=mysqli_connect($host,$username,$password,$DBname);
    // mysqli_set_charset($con,'utf8');
    if($con->connect_error){
        die("connection failed: " . $con->connect_error);
    }


    $sql = 'INSERT INTO regisdriver(busno,datereg,timestart,timeend,timestatus) 
    VALUES("' . $busno . '","' . date("Y-m-d") . '","' . date("H:i:s") . '","' . null . '","' . $status .'")';

    if($con->query($sql) === TRUE){
        // $outp = "Inserted" . $users . "," . $score1 . "," . $score2 . "," . $sugges . "," . $driver;
        // echo json_encode($outp);
    }else{
        echo json_encode("Error: ". $sql. "<br>" . $con->error);
    }

    // $sql ="SELECT busno,timestart,timeend FROM regisdriver WHERE busno = '$busno' AND timestatus = 0 ";
    // $sql2 = "UPDATE regisdriver SET timestart = '$timestart' , timestatus = 1 WHERE busno = '$busno' AND timestatus = 0 LIMIT 1";

    // $result = mysqli_query($con,$sql); 

    

    // if(mysqli_num_rows($result) == 0) {
    //     // require_once 'busqueue.php'; 
    //     $result2 = mysqli_query($con,$sql2);
    // } else {
    //     $result2 = mysqli_query($con,$sql2);
    // }
        
    // $sql = 'INSERT INTO regisdriver(regisno,busno,datereg,timestart,timeend,timestatus)
    // VALUES("' . null . '","' . $busnO .'","' . date("Y-m-d") . '","' . date("H:i:s") . '","' . null . '","' . $statuS . '")';

    // if($con->query($sql) === TRUE){
    //     $outpt = "Inserted" . null . "," . $busnO ."," . date("Y-m-d") . "," . date("H:i:s") . "," . null . "," . $statuS  ;
    //     echo json_encode($outpt);
    // }else{
    //     echo json_encode("Error: ". $sql. "<br>" . $con->error);
    // }
	// if($con){
    //     echo "work";
    //     // echo $_POST;
	// }
	// else{
	// 	echo "not work";
    // }
    $con->close();

    

?>