<?php
include('db.php');
include('function.php');
if(isset($_POST["driver_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM driver 
		WHERE id = '".$_POST["driver_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["first_name"] = $row["first_name"];
		$output["last_name"] = $row["last_name"];
		$output["mphone"] = $row["mphone"];
		$output["birthdate"] = $row["birthdate"];
		$output["userdriver"] = $row["userdriver"];
		$output["pass"] = $row["pass"];
		$output["idpeople"] = $row["idpeople"];
		$output["id"] = $row["id"];
	
	}
	echo json_encode($output);
}
?>