<?php
include('db.php');

function get_total_all_records()
{
	include('db.php');
	 if(isset($_POST["dropdownvalue"])){
		 $dropdown = $_POST["dropdownvalue"];
	 	$statement = $connection->prepare(" SELECT * FROM selectassessdriver WHERE noq = '$dropdown' AND checkassess = (SELECT MAX(checkassess) FROM selectassessdriver WHERE noq =  '$dropdown' LIMIT 1 )");
	}else{
	 	$statement = $connection->prepare(" SELECT * FROM selectassessdriver WHERE noq ");
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
 	$query =  " SELECT  * FROM selectassessdriver INNER JOIN evaservicedriver ON selectassessdriver.questionno = evaservicedriver.id ";
 }else{
 	$query =  " SELECT  * FROM selectassessdriver INNER JOIN evaservicedriver ON selectassessdriver.questionno = evaservicedriver.id ";
 //echo $_POST["dropdownvalue"];
 }


if(isset($_POST["search"]["value"]))
{
	 if(isset($_POST["dropdownvalue"])){

	$dropdown = $_POST["dropdownvalue"];
	$query .=  ' WHERE selectassessdriver.noq LIKE "'.$_POST["dropdownvalue"].'%" AND selectassessdriver.checkassess = (SELECT MAX(checkassess) FROM selectassessdriver WHERE selectassessdriver.noq LIKE "'.$_POST["dropdownvalue"].'%" ) ';
	//$query .= 'WHERE linkdriverlineanddriverstop.driverlineid LIKE "'."".'%" ';
	//$query .= ' OR selectassessdriver.questiondriver LIKE "'.$_POST["dropdownvalue"].'%" ';



 }else{
	$query .= ' WHERE selectassessdriver.questionno LIKE "'.$_POST["search"]["value"].'%" AND selectassessdriver.checkassess = (SELECT MAX(checkassess) FROM selectassessdriver WHERE selectassessdriver.noq LIKE "'.$_POST["dropdownvalue"].'%") ';
	//$query .= 'WHERE linkdriverlineanddriverstop.driverlineid LIKE "'."".'%" ';
	$query .= ' OR evaservicedriver.questiondriver LIKE "'.$_POST["search"]["value"].'%" ';
 }
}
if(isset($_POST["order"]))
{
	$query .= ' ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= ' ORDER BY selectassessdriver.linkassessdriverid ASC  ';
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
	//$sub_array[] = $row["driverlineid"];
//	$sub_array[] = $count;
	//$sub_array[] = $count ." ".$row["driverstopnameTH"] ;
	$sub_array[] = $row["questionno"] ;
	$sub_array[] = $row["questiondriver"] ;



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