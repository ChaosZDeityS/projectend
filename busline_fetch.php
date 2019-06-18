<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM busline");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
$query = '';
$output = array();
$query .= "SELECT * FROM busline ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE buslineid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR buslinename LIKE "%'.$_POST["search"]["value"].'%" ';


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY buslineid ASC ';
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
	$sub_array[] = $row["buslineid"];
	$sub_array[] = $row["buslinename"];
	$sub_array[] =  '<button type="button" name="update" id="'.$row["buslineid"].'" class="btn btn-warning btn-xs update">แก้ไข</button>   <button type="button" name="delete" id="'.$row["buslineid"].'" class="btn btn-danger btn-xs delete">ลบ</button> ' ;


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