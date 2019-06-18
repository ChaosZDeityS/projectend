<?php
require_once("session.php");
require_once("connect.php");
//เลือกดาต้าเบส
$sql = "SELECT * FROM member";
$result = $mysqli->query($sql);


//โชว์ค่า id กับ name ที่เราบันทึกไป
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["t_id"]. " - Nationality: " . $row["nation"]. "  / Sex: " . $row["sex"]. "  / Age: " . $row["age"]. "  / month: " . $row["month"]. "<br>";
    }
} else {
    echo "0 results";
}
$mysqli->close();
?>