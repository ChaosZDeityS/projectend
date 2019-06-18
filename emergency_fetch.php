<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM emer");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
$query = '';
$output = array();
$query .= "SELECT * FROM (emer INNER JOIN driver ON emer.userid = driver.userdriver) ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE emer.emerid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR emer.busno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR emer.emerdate LIKE "%'.$_POST["search"]["value"].'%" ';	
	$query .= 'OR emer.emertime LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR driver.first_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR driver.last_name LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY emerid DESC ';
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
	$sub_array[] = $row["first_name"] ."  " .$row["last_name"];
	$sub_array[] = $row["busno"];
	$sub_array[] = date('d-m-Y',strtotime($row["emerdate"]));;
	$sub_array[] = $row["emertime"];
	$sub_array[] = $row["emerinfo"];


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