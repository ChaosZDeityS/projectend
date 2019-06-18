<?php
require_once("session.php");
require_once("connect.php");
//เลือกดาต้าเบส
$sql = "SELECT StoryData FROM museum_story WHERE story_id = 1";
$result = $mysqli->query($sql);


//โชว์ค่า museum_story ที่เราบันทึกไป
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "" . $row["StoryData"]."";
    }
} else {
    echo "0 results";
}
$mysqli->close();
?>