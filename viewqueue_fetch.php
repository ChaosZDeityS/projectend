<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM busreal WHERE  busstatus = '0' OR busstatus ='1'  ");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}


$query = '';
$output = array();
$query .= "SELECT busno , busstatus FROM busreal WHERE ( busstatus = '0' OR busstatus ='1' ) "; 

/*if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE busno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busstatus LIKE "%'.$_POST["search"]["value"].'%" ';
}*/
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY busstatus DESC , busno ASC  ';
}
if($_POST["length"] != 0)
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