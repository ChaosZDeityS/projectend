<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM selectassessdriver WHERE statusselectassess = 1");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query =  " SELECT  * FROM selectassessdriver INNER JOIN evaservicedriver ON selectassessdriver.questionno = evaservicedriver.id ";

if(isset($_POST["search"]["value"]))
{
	//$query .= 'WHERE scoreevaservicedriver.id LIKE "'.$_POST["search"]["value"].'%" ';
    $query .= ' WHERE selectassessdriver.statusselectassess LIKE "1" ';
 

}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY selectassessdriver.questionno ASC ';
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
	$sub_array[] = $row["questiondriver"];


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