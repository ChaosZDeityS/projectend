<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO driver (first_name, last_name,mphone,birthdate,userdriver,pass,idpeople) 
			VALUES (:first_name, :last_name ,:mphone,:birthdate,:userdriver,:pass,:idpeople)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':mphone'       =>  $_POST["mphone"],
				':birthdate'    =>  $_POST["birthdate"],
				':userdriver'   =>  $_POST["userdriver"],
				':pass'         =>  $_POST["pass"],
				':idpeople'     =>  $_POST["idpeople"]
				
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
			SET first_name = :first_name, last_name = :last_name ,mphone = :mphone ,idpeople = :idpeople ,birthdate = :birthdate ,userdriver = :userdriver ,pass = :pass
			WHERE id = :id"
			
		);
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':id'			=>	$_POST["driver_id"],
				':mphone'       =>  $_POST["mphone"],
				':idpeople'     =>  $_POST["idpeople"],
				':birthdate'    =>  $_POST["birthdate"],
				':userdriver'   =>  $_POST["userdriver"],
				':pass'         =>  $_POST["pass"]
			)
		);
		if(!empty($result))
		{
			echo 'ข้อมูลได้รับการอัพเดท';
		}
	}
}

?>