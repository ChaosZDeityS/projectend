<?php
//connect ฐานข้อมูล
require_once("session.php");
require_once("connect.php");

	//$month = array(11=>'November');
	$age=array(1=>'Child',2=>'Teens',3=>'Adult',4=>'Old'); //ตัวแปรแกรน X
	$sexF= array(); //ตัวแปรแกน y
	$sexM= array(); //ตัวแปรแกน y

//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sql = "SELECT count(age) sex FROM member WHERE age = 'Child' AND sex ='Male'";
$sql2 = "SELECT count(age) sex FROM member WHERE age = 'Child' AND sex = 'Female'";
$sql3 = "SELECT count(age) sex FROM member WHERE age = 'Teens' AND sex ='Male'";
$sql4 = "SELECT count(age) sex FROM member WHERE age = 'Teens' AND sex = 'Female'";
$sql5 = "SELECT count(age) sex FROM member WHERE age = 'Adult' AND sex ='Male'";
$sql6 = "SELECT count(age) sex FROM member WHERE age = 'Adult' AND sex = 'Female'";
$sql7 = "SELECT count(age) sex FROM member WHERE age = 'Old' AND sex ='Male'";
$sql8 = "SELECT count(age) sex FROM member WHERE age = 'Old' AND sex = 'Female'";

//จบ sql

$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
			array_push($sexF,$row['sex']); 

		}
	}
	
$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			//echo $row2["age"];
			array_push($sexM,$row2['sex']);
		}
	}

$result = $mysqli->query($sql3);
	if ($result->num_rows > 0) {
		while($row3 = $result->fetch_assoc()) {
			//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
			array_push($sexF,$row3['sex']); 

		}
	}
	
$result2 = $mysqli->query($sql4);
	if ($result2->num_rows > 0) {
		while($row4 = $result2->fetch_assoc()) {
			//echo $row2["age"];
			array_push($sexM,$row4['sex']);
		}
	}

$result = $mysqli->query($sql5);
	if ($result->num_rows > 0) {
		while($row5 = $result->fetch_assoc()) {
			//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
			array_push($sexF,$row5['sex']); 

		}
	}
	
$result2 = $mysqli->query($sql6);
	if ($result2->num_rows > 0) {
		while($row6 = $result2->fetch_assoc()) {
			//echo $row2["age"];
			array_push($sexM,$row6['sex']);
		}
	}

$result = $mysqli->query($sql7);
	if ($result->num_rows > 0) {
		while($row7 = $result->fetch_assoc()) {
			//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
			array_push($sexF,$row7['sex']); 

		}
	}
	
$result2 = $mysqli->query($sql8);
	if ($result2->num_rows > 0) {
		while($row8 = $result2->fetch_assoc()) {
			//echo $row2["age"];
			array_push($sexM,$row8['sex']);
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
                text: 'กราฟวิเคราะห์ระหว่างอายุกับเพศ' //หัวข้อของกราฟ
            },
            subtitle: {
                text: 'Leelawadee Nan Museum'
            },
            xAxis: {
                categories: ['<?= implode("','", $age); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
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
                 {name: 'Male',
					 data: [<?= implode(',', $sexF)    ?>] },
				 
				 {name: 'Female',
                     data: [<?= implode(',', $sexM)    ?>] }

				

			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>