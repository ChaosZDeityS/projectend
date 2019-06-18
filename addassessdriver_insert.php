<?php
include('db.php');
include('function.php');
$date = date("Y-m-d");

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO evaservicedriver (questiondriver, dateassessdriver) 
			VALUES (:questiondriver, :dateaseessdriver )
		");
		$result = $statement->execute(
			array(
                ':questiondriver'	=>	$_POST["questiondriver"],
                ':dateaseessdriver'	=>	$date,
				
				
			)
		);
		if(!empty($result))
		{
			echo 'บันทึกสำเร็จ';
		}
	}
	if($_POST["operation"] == "Edit")
	{

		//echo $_POST["qassessdriver_id"] ;
		$statement = $connection->prepare(
			"UPDATE evaservicedriver 
			SET questiondriver = :questiondriver , dateassessdriver = '$date' 
			WHERE id =:id"
			
		);
		$result = $statement->execute(
			array(

				':questiondriver'	=>	$_POST["questiondriver"],
				//':dateassessdriver'	=>	'$date',
				':id'			=>	$_POST["qassessdriver_id"]
			
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