<?php
require_once("session.php");
require_once("connect.php");
//เลือกดาต้าเบส
$sql = "SELECT pie_name FROM workpiece WHERE pie_id = 1";
$result = $mysqli->query($sql);


//โชว์ค่า museum_story ที่เราบันทึกไป
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "1." . $row["pie_name"]."";
    }
} else {
    echo "0 results";
}
$mysqli->close();
?>