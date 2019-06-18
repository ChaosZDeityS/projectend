<?php

require("connect.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server



// Select all the rows in the markers table

$query = "SELECT * FROM temp_linkbuslineandbusstop INNER JOIN busstop ON temp_linkbuslineandbusstop.busstopid = busstop.busstopid";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['busstopid']);
  $newnode->setAttribute("name",$row['busstopname']);
  $newnode->setAttribute("address", $row['busstopnameTH']);
  $newnode->setAttribute("lat", $row['latitude']);
  $newnode->setAttribute("lng", $row['longtitude']);
  $newnode->setAttribute("type", "0");
}

echo $dom->saveXML();

?>