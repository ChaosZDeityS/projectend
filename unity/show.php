<?php
require_once("session.php");
require_once("connect.php");
//���͡�ҵ����
$sql = "SELECT * FROM member";
$result = $mysqli->query($sql);


//����� id �Ѻ name �����Һѹ�֡�
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