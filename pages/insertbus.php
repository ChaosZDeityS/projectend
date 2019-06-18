<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO driver (first_name, last_name ) 
			VALUES (:first_name, :last_name )
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				
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
			"UPDATE driver 
			SET first_name = :first_name, last_name = :last_name
			WHERE id = :id"
			
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':id'			=>	$_POST["driver_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>