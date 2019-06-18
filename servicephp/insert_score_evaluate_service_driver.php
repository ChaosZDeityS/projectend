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

    $users = $_POST["users"];
    $score1 = $_POST["score1"];
    $score2 = $_POST["score2"];
    $sugges = $_POST["suggestion"];
    $driver = $_POST["driver"];
    $timeS = $_POST["time"];

    $host="localhost";
	$username="root";
	$password="";
	$DBname="busproject";
	
	
	$con=mysqli_connect($host,$username,$password,$DBname);
    mysqli_set_charset($con,'utf8');
    if($con->connect_error){
        die("connection failed: " . $con->connect_error);
    }
    
    $sql = 'INSERT INTO scoreevaservicedriver(usereva,score1,score2,suggestionD,driverno,time,date) 
    VALUES("' . $users . '","' . $score1 . '","' . $score2 . '","' . $sugges . '","' . $driver . '","' . $timeS . '","' . date("Y-m-d") . '")';

    if($con->query($sql) === TRUE){
        $outp = "Inserted" . $users . "," . $score1 . "," . $score2 . "," . $sugges . "," . $driver . "," . $timeS;
        echo json_encode($outp);
    }else{
        echo json_encode("Error: ". $sql. "<br>" . $con->error);
    }   
	// if($con){
    //     echo "work";
    //     // echo $_POST;
	// }
	// else{
	// 	echo "not work";
    // }
    $con->close();

    

?>