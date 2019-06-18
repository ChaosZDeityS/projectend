<?php
//connect ฐานข้อมูล
require_once("session.php");
require_once("connect.php");

	//$month=array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'); //ตัวแปรแกรน X
	$month = array(9=>'September');
	$P1= array(); //ตัวแปรแกน y
	$P2= array(); //ตัวแปรแกน y
	$P3= array(); //ตัวแปรแกน y
	$P4= array(); //ตัวแปรแกน y
	$P5= array(); //ตัวแปรแกน y
	$P6= array(); //ตัวแปรแกน y
	$P7= array(); //ตัวแปรแกน y
	$P8= array(); //ตัวแปรแกน y
	$P9= array(); //ตัวแปรแกน y

	

//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sql1 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '1'";
$sql2 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '2'";
$sql3 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '3'";
$sql4 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '4'";
$sql5 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '5'";
$sql6 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '6'";
$sql7 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '7'";
$sql8 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '8'";
$sql9 = "SELECT count(*) pie_id FROM stamp WHERE pie_id = '9'";

//$month1 = "SELECT count(*) month FROM member ";
//จบ sql

$result1 = $mysqli->query($sql1);
	if ($result1->num_rows > 0) {
		while($row1 = $result1->fetch_assoc()) {
			array_push($P1,$row1['pie_id']);
		}
	}

$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			//echo $row2["sex"];
			array_push($P2,$row2['pie_id']);
		}
	}

$result3 = $mysqli->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {
			array_push($P3,$row3['pie_id']);
		}
	}

$result4 = $mysqli->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {
			array_push($P4,$row4['pie_id']);
		}
	}

$result5 = $mysqli->query($sql5);
	if ($result5->num_rows > 0) {
		while($row5 = $result5->fetch_assoc()) {
			array_push($P5,$row5['pie_id']);
		}
	}
	
$result6 = $mysqli->query($sql6);
	if ($result6->num_rows > 0) {
		while($row6 = $result6->fetch_assoc()) {
			array_push($P6,$row6['pie_id']);
		}
	}

$result7 = $mysqli->query($sql7);
	if ($result7->num_rows > 0) {
		while($row7 = $result7->fetch_assoc()) {
			array_push($P7,$row7['pie_id']);
		}
	}

$result8 = $mysqli->query($sql8);
	if ($result8->num_rows > 0) {
		while($row8 = $result8->fetch_assoc()) {
			array_push($P8,$row8['pie_id']);
		}
	}

$result9 = $mysqli->query($sql9);
	if ($result9->num_rows > 0) {
		while($row9 = $result9->fetch_assoc()) {
			array_push($P9,$row9['pie_id']);
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
                type: 'column' //รูปแบบของ แผนภูมิ ในที่นี้ให้เป็น column
            },
            title: {
                text: 'Graph showing the number of visitors (Workpiece)' //หัวข้อของกราฟ
            },
            subtitle: {
                text: 'Leelawadee Nan Museum'
            },
            xAxis: {
                categories: ['<?= implode("','", $month); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
            },
            yAxis: {
                title: {
                    text: 'Number of visitors (people)' //หัวข้อกราฟแนวตั้ง
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
				 {name: 'พระพุทธรูปปางมารวิชัย',
					 data: [<?= implode(',', $P1)    ?>] },
				 {name: 'งาช้างดำ',
                     data: [<?= implode(',', $P2)    ?>] },
				 {name: 'สัปคับ',
                     data: [<?= implode(',', $P3)    ?>] },
				 {name: 'พานดุนลาย,ซองพลู,โถและฝาโถ',
                     data: [<?= implode(',', $P4)    ?>] },
				 {name: 'อาณาจักรหลักคำ',
                     data: [<?= implode(',', $P5)    ?>] },
				 {name: 'ตราประทับงาช้าง',
                     data: [<?= implode(',', $P6)    ?>] },
				 {name: 'กระโถนเงิน',
                     data: [<?= implode(',', $P7)    ?>] },
				 {name: 'คนโถ ถมเงิน',
                     data: [<?= implode(',', $P8)    ?>] },
				 {name: 'เตียบ',
                     data: [<?= implode(',', $P9)    ?>] }

			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>