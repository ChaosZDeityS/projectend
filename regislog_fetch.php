<?php

include('db.php');
function get_total_all_records()
{
	include('db.php');
	$datereg = date("Y-m-d");
	$statement = $connection->prepare(" SELECT * FROM regisdriver WHERE  ( timestatus = '1' OR timestatus ='2' ) AND datereg = '$datereg' ");
	//$statement = $connection->prepare("SELECT * FROM regisdriver");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


$query = '';
$output = array();

$query .= " SELECT busno,datereg,timestart,timeend FROM regisdriver  "; 

if(isset($_POST["search"]["value"]))
{
	//$query .= ' WHERE busno LIKE "%'.$_POST["search"]["value"].'%" ';
	$datereg = date("Y-m-d");
	$query .= " WHERE busno LIKE  '%".$_POST["search"]["value"]."%' AND datereg = '$datereg' ";

}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY datereg DESC  ';
}
if($_POST["length"] != 0)
{
	$query .= ' LIMIT '.$_POST['start'].','. $_POST['length'];
}
// echo $query ;
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

	$sub_array = array();
	$sub_array[] = $row["busno"];
	$sub_array[] = date('d-m-Y',strtotime($row["datereg"]));
	if($row["timestart"] == '00:00:00'){
		$row["timestart"] = '-' ; 

	}else if($row["timeend"] == '00:00:00'){
		 $row["timeend"] = '-' ; 

	}else if($row["timestart"] == '00:00:00'&& $row["timeend"] == '00:00:00'){
		$row["timestart"] = '-' ; 
		$row["timeend"] = '-' ; 
		
	

	}

	$sub_array[] = $row["timestart"];
	$sub_array[] = $row["timeend"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>