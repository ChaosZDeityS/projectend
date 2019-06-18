<?php
include('db.php');
include('function.php');

if(isset($_POST["busstop_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM busstop 
		WHERE busstopid = '".$_POST["busstop_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["busstopname"] = $row["busstopname"];
		$output["busstopnameTH"] = $row["busstopnameTH"];
		$output["latitude"] = $row["latitude"];
		$output["longtitude"] = $row["longtitude"];
		//$output["buslineid"] = $row["buslineid"];
	
	}
	echo json_encode($output);
}
?>