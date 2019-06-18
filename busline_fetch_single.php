<?php
include('db.php');
include('function.php');

if(isset($_POST["busline_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM busline 
		WHERE buslineid = '".$_POST["busline_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["buslinename"] = $row["buslinename"];
		$output["buslineid"] = $row["buslineid"];
		
	
	}
	echo json_encode($output);
}
?>