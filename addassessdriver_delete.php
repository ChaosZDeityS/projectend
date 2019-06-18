<?php

include('db.php');
include("function.php");

if(isset($_POST["qassessdriver_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM evaservicedriver WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["qassessdriver_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'ข้อมูลได้ถูกลบเรียบร้อย';
	}
}



?>