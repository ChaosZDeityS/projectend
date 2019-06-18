<?php
require_once("connect.php");//เชื่อมต่อฐานข้อมูล
require_once("session.php");

$story_id = $_POST["story_id"];
$StoryData = $_POST['StoryData'];


	$sql = "UPDATE museum_story SET StoryData = '".$StoryData."'  WHERE story_id='".$story_id."'";
	$result = $mysqli->query($sql);

?>