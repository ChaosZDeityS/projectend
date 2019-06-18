<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM evaservicebus");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query =  " SELECT * FROM evaservicebus ";

if(isset($_POST["search"]["value"]))
{
	//$query .= 'WHERE scoreevaservicedriver.id LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= ' WHERE id LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= ' OR questionbus LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= ' OR dateassessbus LIKE "'.$_POST["search"]["value"].'%" ';
	//$query .= ' OR assessbusid LIKE "'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY id ASC ';
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
	$sub_array[] = $row["id"];
	$sub_array[] = $row["questionbus"];
    $sub_array[] = date('d-m-Y',strtotime($row["dateassessbus"]));
    $sub_array[] =  '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">แก้ไข</button>   <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">ลบ</button> ' ;
	//$sub_array[] = $row["assessbusid"];



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