<?php
include('db.php');

function get_total_all_records()
{
	include('db.php');
	 if(isset($_POST["dropdownvalue"])){
		 $dropdown = $_POST["dropdownvalue"];

	 	$statement = $connection->prepare("SELECT * FROM linkbuslineandbusstop WHERE buslineid = '$dropdown' AND datelink = (SELECT MAX(datelink) FROM linkbuslineandbusstop WHERE buslineid LIKE  $dropdown )");
	}else{
	 	$statement = $connection->prepare("SELECT * FROM linkbuslineandbusstop WHERE buslineid ");
	 }
	
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
if(isset($_POST["dropdownvalue"])){
	$dropdown = $_POST["dropdownvalue"];
	$_SESSION['selection'] = $dropdown ;
 	$query =  "SELECT  linkbuslineandbusstop.buslineid,busstop.busstopnameTH FROM linkbuslineandbusstop 
 INNER JOIN busstop ON linkbuslineandbusstop.busstopid = busstop.busstopid ";
 }else{
 	$query =  "SELECT  linkbuslineandbusstop.buslineid,busstop.busstopnameTH FROM linkbuslineandbusstop 
 INNER JOIN busstop ON linkbuslineandbusstop.busstopid = busstop.busstopid ";
 //echo $_POST["dropdownvalue"];
 }


if(isset($_POST["search"]["value"]))
{
	 if(isset($_POST["dropdownvalue"])){
	
	$dropdown = $_POST["dropdownvalue"];
	$query .= 'WHERE linkbuslineandbusstop.buslineid LIKE "'.$_POST["dropdownvalue"].'%" AND linkbuslineandbusstop.datelink = (SELECT MAX(datelink) FROM linkbuslineandbusstop WHERE linkbuslineandbusstop.buslineid LIKE "'.$_POST["dropdownvalue"].'%" )';
	
	$query .= 'OR busstop.busstopnameTH LIKE "'.$_POST["dropdownvalue"].'%" ';



 }else{
	$query .= 'WHERE linkbuslineandbusstop.buslineid LIKE "'.$_POST["search"]["value"].'%" AND linkbuslineandbusstop.datelink = (SELECT MAX(datelink) FROM linkbuslineandbusstop WHERE linkbuslineandbusstop.buslineid LIKE "'.$_POST["dropdownvalue"].'%") ';

	$query .= 'OR busstop.busstopnameTH LIKE "'.$_POST["search"]["value"].'%" ';
 }
}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY linkbuslineandbusstop.linkid ASC ';
}
if($_POST["length"] != -1)
{
	$query .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
//echo $query;
$statement = $connection->prepare($query);
$statement->execute();
$counter = $statement ->rowCount();


$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();
$count = 1; 
foreach($result as $row)
{


	$sub_array = array();
	//$sub_array[] = $row["buslineid"];
	$sub_array[] = $count;
	//$sub_array[] = $count ." ".$row["busstopnameTH"] ;
	$sub_array[] = $row["busstopnameTH"] ;



	$data[] = $sub_array;
	$count++ ;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);

echo json_encode($output);
?>