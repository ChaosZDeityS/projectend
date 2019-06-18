<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO busline (buslinename) 
			VALUES (:buslinename)
		");
		$result = $statement->execute(
			array(
				':buslinename'	=>	$_POST["buslinename"],
				
				
			)
		);
		if(!empty($result))
		{
			
			echo 'บันทึกสำเร็จ';
		}
	}
	if($_POST["operation"] == "Edit")
	{

		$statement = $connection->prepare(
			"UPDATE busline 
			SET buslinename = :buslinename
			WHERE buslineid = :buslineid"
			
		);
	
		$result = $statement->execute(
			array(
			
				':buslinename'	=>	$_POST["buslinename"],
				':buslineid'	=>	$_POST["busline_id"]

			)
		);
		
		if(!empty($result))
		{
			echo 'ข้อมูลได้รับการอัพเดท';
			
		}
	}
}

?>