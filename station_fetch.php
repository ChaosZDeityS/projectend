<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM busstop");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}
$query = '';
$output = array();
$query .= "SELECT * FROM busstop ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE busstopid LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busstopname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busstopnameTH LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR latitude LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR longtitude LIKE "%'.$_POST["search"]["value"].'%" ';


}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY busstopid ASC ';
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
	$sub_array[] = $row["busstopid"];
	$sub_array[] = $row["busstopname"];
	$sub_array[] = $row["busstopnameTH"];
	$sub_array[] =  '<button type="button" name="update" id="'.$row["busstopid"].'" class="btn btn-warning btn-xs update">แก้ไข</button>   <button type="button" name="delete" id="'.$row["busstopid"].'" class="btn btn-danger btn-xs delete">ลบ</button> ' ;


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