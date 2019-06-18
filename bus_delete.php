<?php

include('db.php');
include("function.php");

if(isset($_POST["bus_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM busreal WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["bus_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'ข้อมูลได้ถูกลบเรียบร้อย';
	}
}



?>