<?php
//connect ฐานข้อมูล
require_once("session.php");
require_once("connect.php");

	$wp=array(1=>'พระพุทธรูปปางมารวิชัย',2=>'งาช้างดำ',3=>'สัปคับ',4=>'พานดุนลาย',5=>'อาณาจักรหลักคำ',6=>'ตราประทับงาช้าง',7=>'กระโถนเงิน',8=>'คนโถ ถมเงิน',9=>'เตียบ'); //ตัวแปรแกรน X
	$age1= array(); //ตัวแปรแกน y
	$age2= array(); //ตัวแปรแกน y
	$age3= array(); //ตัวแปรแกน y
	$age4= array(); //ตัวแปรแกน y

//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sql = "SELECT stamp.pie_id,COUNT(member.t_id ) age
		FROM stamp
		INNER JOIN member
		ON member.t_id = stamp.t_id
		AND member.age = 'Child'
		 GROUP by pie_id";

$sql2 = "SELECT stamp.pie_id,COUNT(member.t_id ) age
		FROM stamp
		INNER JOIN member
		ON member.t_id = stamp.t_id
		AND member.age = 'Teens'
		 GROUP by pie_id";

$sql3 = "SELECT stamp.pie_id,COUNT(member.t_id ) age
		FROM stamp
		INNER JOIN member
		ON member.t_id = stamp.t_id
		AND member.age = 'Adult'
		 GROUP by pie_id";

$sql4 = "SELECT stamp.pie_id,COUNT(member.t_id ) age
		FROM stamp
		INNER JOIN member
		ON member.t_id = stamp.t_id
		AND member.age = 'Old'
		 GROUP by pie_id";
//จบ sql

$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		array_push($age1,$row['age']);
		}
	}

$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			//echo $row2["sex"];
			array_push($age2,$row2['age']);
		}
	}

$result3 = $mysqli->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {
		array_push($age3,$row3['age']);
		}
	}

$result4 = $mysqli->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {
			//echo $row2["sex"];
			array_push($age4,$row4['age']);
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
                type: 'line' //รูปแบบของ แผนภูมิ ในที่นี้ให้เป็น line
            },
            title: {
                text: 'กราฟวิเคราะห์ระหว่างชิ้นงานกับอายุ' //หัวข้อของกราฟ
            },
            subtitle: {
                text: 'Leelawadee Nan Museum'
            },
            xAxis: {
                categories: ['<?= implode("','", $wp); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
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
                 {name: 'Child',
					 data: [<?= implode(',', $age1)    ?>] },	 
				 {name: 'Teens',
                     data: [<?= implode(',', $age2)    ?>] },
				 {name: 'Adult',
					 data: [<?= implode(',', $age3)    ?>] },
				 {name: 'Old',
					 data: [<?= implode(',', $age4)    ?>] }

				

			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>