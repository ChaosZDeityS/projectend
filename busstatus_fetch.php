<?php

include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM busreal");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query .= "SELECT * FROM busreal ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE busno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busid LIKE "%'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY busno  ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

	$sub_array = array();
	$sub_array[] = $row["busno"];
	$sub_array[] = $row["busid"];
	if($row["busstatus"]==0){
		$row["busstatus"] = '<img  src="img/yellow.png" alt="standby" width="35" height="35">';
	}else if($row["busstatus"]==1) {
		$row["busstatus"] = '<img  src="img/green.png" alt="ok" width="35" height="35">';
	}else if($row["busstatus"]==2) {
		$row["busstatus"] = '<img  src="img/red.png" alt="not" width="35" height="35">';
	}else if($row["busstatus"]==3) {
		$row["busstatus"] = '<img  src="img/blue.png" alt="unknown" width="35" height="35">';
	}
	$sub_array[] = $row["busstatus"];
	$sub_array[] = $row["comment"];
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