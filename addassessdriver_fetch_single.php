<?php
include('db.php');
include('function.php');

if(isset($_POST["qassessdriver_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM evaservicedriver 
		WHERE id = '".$_POST["qassessdriver_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["questiondriver"] = $row["questiondriver"];
		$output["qassessdriver_id"] = $row["id"];
		
	
	}
	echo json_encode($output);
}
?>