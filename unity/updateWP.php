<?php
require_once("connect.php");//เชื่อมต่อฐานข้อมูล
require_once("session.php");

$pie_id = $_POST["pie_id"];
$pie_name = $_POST["pie_name"];

	$sql = "UPDATE workpiece t1 JOIN location t2 ON (t1.pie_id = t2.location_id)  SET t1.pie_name='".$pie_name."',t2.location_detail='".$pie_name."'  WHERE t1.pie_id='".$pie_id."'";

	$result = $mysqli->query($sql);

?>