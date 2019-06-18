<?php
//connect ฐานข้อมูล
require_once("session.php");
require_once("connect.php");

	//$month = array(11=>'November');
	$sex=array(1=>'Male',2=>'Female'); //ตัวแปรแกรน X
	$nation1= array(); //ตัวแปรแกน y
	$nation2= array(); //ตัวแปรแกน y

//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sql = "SELECT count(sex) nation FROM member WHERE sex = 'Male' AND nation ='THAILAND'";
$sql2 = "SELECT count(sex) nation FROM member WHERE sex = 'Male' AND nation = 'FOREIGN'";
$sql3 = "SELECT count(sex) nation FROM member WHERE sex = 'Female' AND nation ='THAILAND'";
$sql4 = "SELECT count(sex) nation FROM member WHERE sex = 'Female' AND nation = 'FOREIGN'";

//จบ sql

$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
			array_push($nation1,$row['nation']); 

		}
	}
	
$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			//echo $row2["age"];
			array_push($nation2,$row2['nation']);
		}
	}

$result = $mysqli->query($sql3);
	if ($result->num_rows > 0) {
		while($row3 = $result->fetch_assoc()) {
			//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
			array_push($nation1,$row3['nation']); 

		}
	}
	
$result2 = $mysqli->query($sql4);
	if ($result2->num_rows > 0) {
		while($row4 = $result2->fetch_assoc()) {
			//echo $row2["age"];
			array_push($nation2,$row4['nation']);
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
                text: 'กราฟวิเคราะห์ระหว่างเพศกับสัญชาติ' //หัวข้อของกราฟ
            },
            subtitle: {
                text: 'Leelawadee Nan Museum'
            },
            xAxis: {
                categories: ['<?= implode("','", $sex); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
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
                 {name: 'THAILAND',
					 data: [<?= implode(',', $nation1)    ?>] },
				 
				 {name: 'FOREIGN',
                     data: [<?= implode(',', $nation2)    ?>] }

				

			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>