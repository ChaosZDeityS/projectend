<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM selectassessbus WHERE statusselectassess = 1");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query =  " SELECT  * FROM selectassessbus INNER JOIN evaservicebus ON selectassessbus.questionno = evaservicebus.id ";

if(isset($_POST["search"]["value"]))
{
	//$query .= 'WHERE scoreevaservicedriver.id LIKE "'.$_POST["search"]["value"].'%" ';
    $query .= ' WHERE selectassessbus.statusselectassess LIKE "1" ';
 

}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY selectassessbus.questionno ASC ';
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
	$sub_array[] = $row["questionno"];
	$sub_array[] = $row["questionbus"];


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