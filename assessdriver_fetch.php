<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM scoreevaservicedriver");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
$query =  "SELECT * FROM (((scoreevaservicedriver 
INNER JOIN users ON scoreevaservicedriver.usereva=users.user)
INNER JOIN driver ON scoreevaservicedriver.driverno=driver.userdriver) 
INNER JOIN evaservicedriver ON scoreevaservicedriver.questionno = evaservicedriver.id) ";

if(isset($_POST["search"]["value"]))
{
	//$query .= 'WHERE scoreevaservicedriver.id LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'WHERE scoreevaservicedriver.driverno LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicedriver.date LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicedriver.time LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicedriver.questionno LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR scoreevaservicedriver.score LIKE "'.$_POST["search"]["value"].'%" ';
	$query .= 'OR users.fullname LIKE "'.$_POST["search"]["value"].'%" ';

}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY scoreevaservicedriver.id DESC ';
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
	$sub_array[] = $row["fullname"];
	$sub_array[] = $row["first_name"] ."   ".$row["last_name"];
	$sub_array[] = $row["date"];
	$sub_array[] = $row["time"];
	$sub_array[] = $row["questiondriver"];
	$sub_array[] = $row["score"];
	$sub_array[] = $row["suggestionD"];


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