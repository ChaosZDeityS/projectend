<?php

require_once("connect.php");//�������Ͱҹ������
require_once("session.php");

$nation = $_POST['nation'];
$sex = $_POST['sex'];
$age = $_POST['age'];


//����� insert

 	$sql = "INSERT INTO member (nation,sex,age) VALUES ('".$nation."','".$sex."','".$age."')";

	$mysqli->query($sql);
	$last_id = $mysqli->insert_id; //�Ѻ��� insert_id ����ش������������ last_id

	echo $last_id;
	
	//echo json_encode($result->fetch_assoc());


?>