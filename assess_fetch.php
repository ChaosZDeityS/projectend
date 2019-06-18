<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM scoreevaservicebus");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query =  "SELECT * FROM ((scoreevaservicebus INNER JOIN users ON scoreevaservicebus.usereva=users.user)
INNER JOIN evaservicebus ON scoreevaservicebus.questionno = evaservicebus.id) ";

if(isset($_POST["search"]["value"]))
{
	//$query .= 'WHERE scoreevaservicebus.id LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'WHERE scoreevaservicebus.busno LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicebus.date LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicebus.time LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicebus.questionno LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicebus.score LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR evaservicebus.questionbus LIKE "'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY scoreevaservicebus.id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
//echo $query ;
$statement = $connection->prepare($query);
$statement->execute();
$counter = $statement ->rowCount();


$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();
 
foreach($result as $row)
{


	$sub_array = array();

	$sub_array[] = $row["busno"];
	$sub_array[] = $row["date"];
	$sub_array[] = $row["time"];
	$sub_array[] = $row["questionbus"];
	$sub_array[] = $row["score"];
	$sub_array[] = $row["suggestion"];


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