<?php

require_once("connect.php");
require_once("session.php");


$t_id = $_POST["t_id"];
$imageid = $_POST["pie_id"];

	$sql = "INSERT INTO stamp (pie_id,t_id) VALUES (".$imageid.",".$t_id.")"; //insert ŧ stamp
	$result = $mysqli->query($sql);

	//console.log($sql);

?>