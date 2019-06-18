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

$selecttable = "busreal" ; 
$query = '';
$output = array();
$query .= "SELECT * FROM busreal ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE busno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busline LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR id LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR seat LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY busno ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement1 = $connection->prepare($query);
$statement1->execute();
$result = $statement1->fetchAll();
$data = array();
$filtered_rows = $statement1->rowCount();
foreach($result as $row)
{

	$sub_array = array();
	$sub_array[] = $row["busno"];
	$sub_array[] = $row["busid"];
	if($row["busline"]==1){
		$row["busline"] = '[1]หน้ามอ - ตึก ICT';
	}else if($row["busline"]==2) {
		$row["busline"] = '[2]หน้ามอ - ตึกวิศวะ';
	}else if($row["busline"]==3) {
		$row["busline"] = '[3]หอใน';
	}
	$sub_array[] = $row["busline"];
	$sub_array[] = $row["seat"];
	$sub_array[] =  '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">แก้ไข</button>   <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">ลบ</button> ' ;


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