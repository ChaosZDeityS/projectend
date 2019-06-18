<?php

require_once("connect.php");//เชื่อมต่อฐานข้อมูล
require_once("session.php");

$nation = $_POST['nation'];
$sex = $_POST['sex'];
$age = $_POST['age'];


//คำสั่ง insert

 	$sql = "INSERT INTO member (nation,sex,age) VALUES ('".$nation."','".$sex."','".$age."')";

	$mysqli->query($sql);
	$last_id = $mysqli->insert_id; //รับค่า insert_id ตัวสุดท้ายมาเก็บไว้ใน last_id

	echo $last_id;
	
	//echo json_encode($result->fetch_assoc());


?>