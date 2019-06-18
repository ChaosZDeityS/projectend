<?php
    // header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *"); 
    header('Access-Control-Allow-Headers: Origin, Content-Type'); 
    header('Access-Control-Allow-Headers: Content-Type,X-Custom-Header'); 
    header('Content-type: application/json');


    include('config.ini.php');

    $rest_json = file_get_contents("php://input");
    $_POST = json_decode($rest_json, true);

    // $id = $_POST["null"];
    $users = $_POST["users"];
    $score1 = $_POST["score1"];
    // $score2 = $_POST["score2"];
    $sugges = $_POST["suggestion"];
    $busno = $_POST["busno"];
    $timeS = $_POST["time"];
    $id = $_POST["id"];
    $noq = $_POST["noq"];

    echo "id :",$id;
    // exit();

    // $host="localhost";
	// $username="root";
	// $password="";
	// $DBname="busproject";
	
	// mysqli_set_charset($con,"utf8");
	// $con=mysqli_connect($host,$username,$password,$DBname);
    mysqli_set_charset($con,'utf8');
    if($con->connect_error){
        die("connection failed: " . $con->connect_error);
    }
    // for($i=0;$i<){

    // }
    
    $sql = 'INSERT INTO scoreevaservicebus(usereva,noq,questionno,score,suggestion,busno,time,date)
    VALUES("' . $users . '","' . $noq . '","' . $id . '","' . $score1 . '","' . $sugges . '","' . $busno .'","' . $timeS . '","' . date("Y-m-d") . '")';
    // VALUES("' . $users . '","' . $score1 . '","' . $score2 . '","' . $sugges . '","' . $busno .'","' . $timeS . '","' . date("Y-m-d") . '")';

    if($con->query($sql) === TRUE){
        $outp = "Inserted" .$users . '","' . $id . '","' . $score1 . '","' . $sugges . '","' . $busno .'","' . $timeS . '","' . date("Y-m-d");
        // $outp = "Inserted" .$users . ",". $score1 . "," . $score2 . "," . $sugges . "," . $busno . "," . $timeS;
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
