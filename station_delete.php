<?php

include('db.php');
include("function.php");

if(isset($_POST["busstop_id"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM busstop WHERE busstopid = :busstopid"
	);
	$result = $statement->execute(
		array(
			':busstopid'	=>	$_POST["busstop_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'ข้อมูลได้ถูกลบเรียบร้อย';
	}
}



?>