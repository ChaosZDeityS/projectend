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

    $host="localhost";
	$username="root";
	$password="";
	$DBname="busproject";





    date_default_timezone_set("Asia/Bangkok");
    $users = $_POST["users"];
    $req = $_POST["req"];
    $busline = $_POST["busline"];
    // $file = $_POST["file"];
    // $base64img = $_POST["base64"];


    // =============================================================================


    // ----------------------------------------------------------------------
    // $data = ['result' => false];
    // $target_part = rand().'.jpg';
    // echo "$target_part";
    // echo "Postfile :".$_POST['file'];
    // echo "file :".$file;
    // echo "base64 :",$base64img;
    // if(isset($_POST['file'])){
    //     $imagedata = $_POST['file'];
    //     // $imagedata = $_POST["postdata"];
    //     $imagedata = str_replace('data:image/jpeg;base64,', '', $imagedata);
    //     $imagedata = str_replace('data:image/jpg;base64,', '', $imagedata);
    //     $imagedata = str_replace(' ', '+', $imagedata);
    //     $imagedata = base64_decode($imagedata);

    //     // $destination = './uploadImg/' .$target_part;

    //     file_put_contents('./uploadImg/' .$target_part, $imagedata);
    //     $data['resual'] = true;
    //     $data['image_url'] = './uploadImg/' . $target_part;
    //     echo json_encode($data);
    // }
    // echo json_encode($data);
    // echo "json_encode($input)";
    // ----------------------------------------------------------------------


	
	$con=mysqli_connect($host,$username,$password,$DBname);
    // mysqli_set_charset($con,'utf8');
    if($con->connect_error){
        die("connection failed: " . $con->connect_error);
    }
    // =============================================================================

   

    // =============================================================================
    
    $sql = 'INSERT INTO requestbus(requestno,user,busstop,busline,date,time)
    VALUES("' . null .'","' . $users . '","' . $req . '","' . $busline . '","' . date("Y-m-d") . '","' . date("H:i:s") .'")';
// =============================
    if($con->query($sql) === TRUE){
        $outp = "Inserted" . null .",".$users.",".$req.",".$busline.",".date("Y-m-d").",".date("H:i:s");
        echo json_encode($outp);
    }else{
        echo json_encode("Error: ". $sql. "<br>" . $con->error);
    }
// =================================


	// if($con){
    //     echo "work";
    //     // echo $_POST;
	// }
	// else{
	// 	echo "not work";
    // }
    $con->close();

    

?>