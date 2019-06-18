<?php
//connect ฐานข้อมูล
require_once("session.php");
require_once("connect.php");

	//$time=array(1=>'9:00น.',2=>'10:00น.',3=>'11:00น.',4=>'12:00น.',5=>'13:00น.',6=>'14:00น.',7=>'15:00น.',8=>'16:00น.'); //ตัวแปรแกรน X
	$time = array('ช่วงเวลาที่มีการเข้าชม(เข้าใช้งานแอปพลิเคชัน)');
	$t1= array(); //ตัวแปรแกน y
	$t2= array(); //ตัวแปรแกน y
	$t3= array(); //ตัวแปรแกน y
	$t4= array(); //ตัวแปรแกน y
	$t5= array(); //ตัวแปรแกน y
	$t6= array(); //ตัวแปรแกน y
	$t7= array(); //ตัวแปรแกน y
	$t8= array(); //ตัวแปรแกน y

//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sql1 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 9";

$sql2 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 10";

$sql3 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 11";

$sql4 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 12";

$sql5 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 13";
$sql6 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 14";

$sql7 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 15";
			 
$sql8 = "SELECT COUNT(t_id) month
		FROM member
		WHERE HOUR(month)  = 16";

//จบ sql

$result1 = $mysqli->query($sql1);
	if ($result1->num_rows > 0) {
		while($row1 = $result1->fetch_assoc()) {
			array_push($t1,$row1['month']);
		}
	}

$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			//echo $row2["sex"];
			array_push($t2,$row2['month']);
		}
	}

$result3 = $mysqli->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {
			array_push($t3,$row3['month']);
		}
	}

$result4 = $mysqli->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {
			array_push($t4,$row4['month']);
		}
	}

$result5 = $mysqli->query($sql5);
	if ($result5->num_rows > 0) {
		while($row5 = $result5->fetch_assoc()) {
			array_push($t5,$row5['month']);
		}
	}
	
$result6 = $mysqli->query($sql6);
	if ($result6->num_rows > 0) {
		while($row6 = $result6->fetch_assoc()) {
			array_push($t6,$row6['month']);
		}
	}

$result7 = $mysqli->query($sql7);
	if ($result7->num_rows > 0) {
		while($row7 = $result7->fetch_assoc()) {
			array_push($t7,$row7['month']);
		}
	}

$result8 = $mysqli->query($sql8);
	if ($result8->num_rows > 0) {
		while($row8 = $result8->fetch_assoc()) {
			array_push($t8,$row8['month']);
		}
	}

?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Graph Example</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script>     
        <script>

 $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column' //รูปแบบของ แผนภูมิ ในที่นี้ให้เป็น line
            },
            title: {
                text: 'กราฟวิเคราะห์ช่วงเวลาในการเข้าชมพิพิธภัณฑสถานแห่งชาติ น่าน' //หัวข้อของกราฟ
            },
            subtitle: {
                text: 'Leelawadee Nan Museum'
            },
            xAxis: {
                categories: ['<?= implode("','", $time); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
            },
            yAxis: {
                title: {
                    text: 'จำนวนคน (คน)' //หัวข้อกราฟแนวตั้ง
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'people';
                }
            },
	legend: { //ตั้งค่าตำแหน่งค่าตัวแปรของแท่ง
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'top',
				x: -10,  
				y: 100,
                borderWidth: 0
            },
     plotOptions: {
               line: {
                   dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
	 series: [
                 {name: '9:00น.',
					 data: [<?= implode(',', $t1)    ?>] },
				 
				 {name: '10:00น.',
                     data: [<?= implode(',', $t2)    ?>] },
				 {name: '11:00น.',
                     data: [<?= implode(',', $t3)    ?>] },
				 {name: '12:00น.',
                     data: [<?= implode(',', $t4)    ?>] },
				 {name: '13:00น.',
                     data: [<?= implode(',', $t5)    ?>] },
				 {name: '14:00น.',
                     data: [<?= implode(',', $t6)    ?>] },
				 {name: '15:00น.',
                     data: [<?= implode(',', $t7)    ?>] },
				 {name: '16:00น.',
                     data: [<?= implode(',', $t8)    ?>] }


			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>