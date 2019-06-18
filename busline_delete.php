<?php

include('db.php');
include("function.php");

if(isset($_POST["busline_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM busline WHERE buslineid = :buslineid"
	);
	$result = $statement->execute(
		array(
			':buslineid'	=>	$_POST["busline_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'ข้อมูลได้ถูกลบเรียบร้อย';
	}
}



?>