<?php
require_once("session.php");
require_once("connect.php");
//���͡�ҵ����
$sql = "SELECT pie_name FROM workpiece WHERE pie_id = 1";
$result = $mysqli->query($sql);


//����� museum_story �����Һѹ�֡�
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