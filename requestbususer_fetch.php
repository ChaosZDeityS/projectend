<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM requestbus");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
// $query = "SELECT * FROM (((requestbus 
// INNER JOIN users ON requestbus.user = users.user) 
// INNER JOIN busline ON requestbus.busline = busline.buslineid)
// INNER JOIN busstop ON requestbus.busstop = busstop.busstopid)";
//$query ="SELECT * FROM requestbus  " ;
$query = "SELECT * FROM (((requestbus 
INNER JOIN users ON requestbus.user = users.user) 
INNER JOIN busline ON requestbus.busline = busline.buslineid)
INNER JOIN busstop ON requestbus.busstop = busstop.busstopname)" ;

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE requestbus.requestno LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR users.fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busstop.busstopnameTH LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR busline.buslinename LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR requestbus.date LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR requestbus.time LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY  requestno DESC ';
}
if($_POST["length"] != -1)
{
	$query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{



	$sub_array = array();
	$sub_array[] = $row["fullname"];
	$sub_array[] = $row["busstopnameTH"];
	$sub_array[] = $row["buslinename"];
	$sub_array[] = date('d-m-Y',strtotime($row["date"]));
	$sub_array[] = $row["time"];



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