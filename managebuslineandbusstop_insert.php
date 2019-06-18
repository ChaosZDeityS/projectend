<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{

		$statement = $connection->prepare("
			INSERT INTO linkbuslineandbusstop (buslineid)
			VALUES (:buslineidin)
		");
		$result = $statement->execute(
			array(
		
				':buslineidin'     =>  $_POST["buslineidin"]
				
			)
		);
		if(!empty($result))
		{
			echo 'บันทึกสำเร็จ';
		}
	}
}


?>