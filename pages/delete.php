<?php

include('db.php');
include("function.php");

if(isset($_POST["driver_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM driver WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["driver_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'ข้อมูลได้ถูกลบเรียบร้อย';
	}
}



?>