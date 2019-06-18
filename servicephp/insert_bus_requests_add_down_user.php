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
    $ReqDown = $_POST["emergency2"];

    $host="localhost";
	$username="root";
	$password="";
	$DBname="busproject";
	
	
	$con=mysqli_connect($host,$username,$password,$DBname);
    // mysqli_set_charset($con,'utf8');
    if($con->connect_error){
        die("connection failed: " . $con->connect_error);
    }
    
    $sql = 'INSERT INTO regisdriver(requests_ADU)
    VALUES("' . $ReqDown . '")';

    if($con->query($sql) === TRUE){
        $outp = "Inserted" . $ReqDown ;
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