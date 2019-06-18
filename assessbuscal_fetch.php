<?php
include('db.php');
function get_total_all_records()
{
	include('db.php');
	//$statement = $connection->prepare("SELECT * FROM scoreevaservicebus");
	if(isset($_POST["dropdownvalue"])){
		$dropdown = $_POST["dropdownvalue"];

		$statement = $connection->prepare("SELECT * FROM scoreevaservicebus WHERE busno = '$dropdown' GROUP BY questionno");
   }else{
		$statement = $connection->prepare("SELECT * FROM scoreevaservicebus GROUP BY busno ");
	}

	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
//$query =  "SELECT busno FROM busreal  ";
if(isset($_POST["dropdownvalue"])){
	$dropdown = $_POST["dropdownvalue"];
	$_SESSION['selection'] = $dropdown ;
	$query = "SELECT busreal.busno,evaservicebus.questionbus,AVG(score) AS S1 FROM ((scoreevaservicebus 
	INNER JOIN busreal ON scoreevaservicebus.busno = busreal.busno)
	INNER JOIN evaservicebus ON scoreevaservicebus.questionno = evaservicebus.id) " ; 
 }else{
	$query = "SELECT busreal.busno,evaservicebus.questionbus,AVG(score) AS S1 FROM ((scoreevaservicebus 
	INNER JOIN busreal ON scoreevaservicebus.busno = busreal.busno)
	INNER JOIN evaservicebus ON scoreevaservicebus.questionno = evaservicebus.id) " ; 
 }


// $query = "SELECT driver.first_name,driver.last_name,evaservicebus.questionbus,AVG(score) AS S1 FROM ((scoreevaservicebus 
// INNER JOIN driver ON scoreevaservicebus.busno = driver.userdriver)
// INNER JOIN evaservicebus ON scoreevaservicebus.questionno = evaservicebus.id) " ; 

if(isset($_POST["search"]["value"]))
{
	if(isset($_POST["dropdownvalue"])){
	
		$dropdown = $_POST["dropdownvalue"];
		$query .= 'WHERE scoreevaservicebus.busno = "'.$_POST["dropdownvalue"].'%" ';
		
		$query .= 'OR scoreevaservicebus.score = "'.$_POST["dropdownvalue"].'%" ';
	
   

}else{
	$query .= ' WHERE scoreevaservicebus.busno = "'.$_POST["search"]["value"].'%" ';
 
	$query .= ' OR scoreevaservicebus.score = "%'.$_POST["search"]["value"].'%" '; 
}
}


if(isset($_POST["order"]))
{
    $query .= ' GROUP BY scoreevaservicebus.busno,scoreevaservicebus.questionno ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

}
else
{
	$query .= ' GROUP BY scoreevaservicebus.busno,scoreevaservicebus.questionno ORDER BY busno ASC ';
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


	$sub_array[] = $row["questionbus"];
	
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