<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	//$statement = $connection->prepare("SELECT * FROM scoreevaservicedriver");
	if(isset($_POST["dropdownvalue"])){
		$dropdown = $_POST["dropdownvalue"];

		$statement = $connection->prepare("SELECT * FROM scoreevaservicedriver WHERE driverno = '$dropdown' GROUP BY questionno");
   }else{
		$statement = $connection->prepare("SELECT * FROM scoreevaservicedriver GROUP BY driverno ");
	}

	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
//$query =  "SELECT driverno FROM busreal  ";
if(isset($_POST["dropdownvalue"])){
	$dropdown = $_POST["dropdownvalue"];
	$_SESSION['selection'] = $dropdown ;
	$query = "SELECT driver.first_name,driver.last_name,evaservicedriver.questiondriver,AVG(score) AS S1 FROM ((scoreevaservicedriver 
	INNER JOIN driver ON scoreevaservicedriver.driverno = driver.userdriver)
	INNER JOIN evaservicedriver ON scoreevaservicedriver.questionno = evaservicedriver.id) " ; 
 }else{
	$query = "SELECT driver.first_name,driver.last_name,evaservicedriver.questiondriver,AVG(score) AS S1 FROM ((scoreevaservicedriver 
	INNER JOIN driver ON scoreevaservicedriver.driverno = driver.userdriver)
	INNER JOIN evaservicedriver ON scoreevaservicedriver.questionno = evaservicedriver.id) " ; 
 }


// $query = "SELECT driver.first_name,driver.last_name,evaservicedriver.questiondriver,AVG(score) AS S1 FROM ((scoreevaservicedriver 
// INNER JOIN driver ON scoreevaservicedriver.driverno = driver.userdriver)
// INNER JOIN evaservicedriver ON scoreevaservicedriver.questionno = evaservicedriver.id) " ; 

if(isset($_POST["search"]["value"]))
{
	if(isset($_POST["dropdownvalue"])){
	
		$dropdown = $_POST["dropdownvalue"];
		$query .= 'WHERE scoreevaservicedriver.driverno LIKE "'.$_POST["dropdownvalue"].'%" ';
		
		$query .= 'OR scoreevaservicedriver.score LIKE "'.$_POST["dropdownvalue"].'%" ';
	
   

}else{
	$query .= ' WHERE scoreevaservicedriver.driverno LIKE "'.$_POST["search"]["value"].'%" ';
 
	$query .= ' OR scoreevaservicedriver.score LIKE "%'.$_POST["search"]["value"].'%" '; 
}
}


if(isset($_POST["order"]))
{
    $query .= ' GROUP BY scoreevaservicedriver.driverno,scoreevaservicedriver.questionno ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

}
else
{
	$query .= ' GROUP BY scoreevaservicedriver.driverno,scoreevaservicedriver.questionno ORDER BY driverno ASC ';
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


	$sub_array[] = $row["questiondriver"];
	
    $sub_array[] = $row["S1"];
   // $sub_array[] = ($row["S1"] + $row["S2"])/2 ; 


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