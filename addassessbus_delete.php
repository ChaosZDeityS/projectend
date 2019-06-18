<?php

include('db.php');
include("function.php");

if(isset($_POST["qassessbus_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM evaservicebus WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["qassessbus_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'ข้อมูลได้ถูกลบเรียบร้อย';
	}
}



?>