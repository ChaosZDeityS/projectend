<?php
include('db.php');
include('function.php');
$date = date("Y-m-d");

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO evaservicebus (questionbus, dateassessbus) 
			VALUES (:questionbus, :dateaseessbus )
		");
		$result = $statement->execute(
			array(
                ':questionbus'	=>	$_POST["questionbus"],
                ':dateaseessbus'	=>	$date,
				
				
			)
		);
		if(!empty($result))
		{
			echo 'บันทึกสำเร็จ';
		}
	}
	if($_POST["operation"] == "Edit")
	{

		//echo $_POST["qassessbus_id"] ;
		$statement = $connection->prepare(
			"UPDATE evaservicebus 
			SET questionbus = :questionbus , dateassessbus = '$date' 
			WHERE id =:id"
			
		);
		$result = $statement->execute(
			array(

				':questionbus'	=>	$_POST["questionbus"],
				//':dateassessbus'	=>	'$date',
				':id'			=>	$_POST["qassessbus_id"]
			
			)
		);
		if(!empty($result))
		{
			echo 'ข้อมูลได้รับการอัพเดท';
		}else{
			echo 'NOPE' ;
		}
		
	}
		
}

?>