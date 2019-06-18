<?php
include('db.php');
include('function.php');

if(isset($_POST["qassessbus_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM evaservicebus 
		WHERE id = '".$_POST["qassessbus_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["questionbus"] = $row["questionbus"];
		$output["qassessbus_id"] = $row["id"];
		
	
	}
	echo json_encode($output);
}
?>