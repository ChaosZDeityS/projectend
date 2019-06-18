<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	
		$statement = $connection->prepare("
			INSERT INTO busstop (busstopname,busstopnameTH,latitude,longtitude) 
			VALUES (:busstopname,:busstopnameTH,:latitude,:longtitude)
		");
		$result = $statement->execute(
			array(
				':busstopname'	=>	$_POST["busstopname"],
				':busstopnameTH'	=>	$_POST["busstopnameTH"],
				':latitude'	=>	$_POST["latitude"],
				':longtitude'	=>	$_POST["longtitude"],
				
				
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
			"UPDATE busstop 
			SET busstopname = :busstopname ,  busstopnameTH = :busstopnameTH ,  latitude = :latitude , longtitude = :longtitude 
			WHERE busstopid = :busstopid"
			
		);
	
		$result = $statement->execute(
			array(
				':busstopid'	=>	$_POST["busstop_id"],
				':busstopname'	=>	$_POST["busstopname"],
				':busstopnameTH'	=>	$_POST["busstopnameTH"],
				':latitude'	=>	$_POST["latitude"],
				':longtitude'	=>	$_POST["longtitude"],
			)
		);
	
	}
}

?>