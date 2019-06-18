<?php
include('db.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO busreal (busno,busid,seat,busline) 
			VALUES (:busno,:busid,:seat,:busline)
		");
		$result = $statement->execute(
			array(
				':busno'	=>	$_POST["busno"],
				':busid'	=>	$_POST["busid"],
				':seat'       =>  $_POST["seat"],
				':busline'    =>  $_POST["busline"],
				
				
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
			"UPDATE busreal 
			SET busno = :busno, busid = :busid ,seat = :seat ,busline = :busline  
			WHERE id = :id"
			
		);
		$result = $statement->execute(
			array(
				':busno'	=>	$_POST["busno"],
				':busid'	=>	$_POST["busid"],
				':id'			=>	$_POST["bus_id"],
				':seat'       =>  $_POST["seat"],			
				':busline'    =>  $_POST["busline"],
			
			)
		);
		if(!empty($result))
		{
			echo 'ข้อมูลได้รับการอัพเดท';
		}
	}
}

?>