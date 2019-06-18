<?php
include('db.php');

if(isset($_POST["bus_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM busreal 
		WHERE id = '".$_POST["bus_id"]."' 
		LIMIT 1 "
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["busno"] = $row["busno"];
		$output["busid"] = $row["busid"];
		$output["busline"] = $row["busline"];
		$output["seat"] = $row["seat"];
		$output["id"] = $row["id"];
		
	
	}
	echo json_encode($output);
}
?>