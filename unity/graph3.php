<?php
//connect ฐานข้อมูล
require_once("session.php");
require_once("connect.php");

	//$month=array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'); //ตัวแปรแกรน X
	$month = array(10=>'October');
	$TH= array(); //ตัวแปรแกน y
	$FG= array(); //ตัวแปรแกน y

	

//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
$sql = "SELECT count(*) nation FROM member WHERE nation = 'THAILAND'";
$sql2 = "SELECT count(*) nation FROM member WHERE nation = 'FOREIGN'";
//จบ sql

$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($TH,$row['nation']);
			//print_r($month);
		}
	}

$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			//echo $row2["name"];
			array_push($FG,$row2['nation']);
		}
	}
	//print_r($month);

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
                text: 'Graph showing the number of visitors (Nationaity)' //หัวข้อของกราฟ
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
                 {name: 'THAILAND',
					 data: [<?= implode(',', $TH)    ?>] },
				 {name: 'FOREIGN',
                     data: [<?= implode(',', $FG)    ?>] }

			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>