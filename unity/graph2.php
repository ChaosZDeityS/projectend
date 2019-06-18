<?php
//connect �ҹ������
require_once("session.php");
require_once("connect.php");
	//$month=array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'); //������ù X
	$month = array(10=>'October');
	$child= array(); //�����᡹ y
	$teens= array(); //�����᡹ y
	$adult= array(); //�����᡹ y
	$old= array(); //�����᡹ y
	
	

//sql ����Ѻ�֧������ �ҡ �ҹ������
$sql = "SELECT count(*) age FROM member WHERE age = 'Child'";
$sql2 = "SELECT count(*) age FROM member WHERE age = 'Teens'";
$sql3 = "SELECT count(*) age FROM member WHERE age = 'Adult'";
$sql4 = "SELECT count(*) age FROM member WHERE age = 'Old'";



//�� sql

$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($child,$row['age']);
		}
	}

$result2 = $mysqli->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) {
			array_push($teens,$row2['age']);
		}
	}

$result3 = $mysqli->query($sql3);
	if ($result3->num_rows > 0) {
		while($row3 = $result3->fetch_assoc()) {
			array_push($adult,$row3['age']);
		}
	}

$result4 = $mysqli->query($sql4);
	if ($result4->num_rows > 0) {
		while($row4 = $result4->fetch_assoc()) {
			array_push($old,$row4['age']);
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
                type: 'column' //�ٻẺ�ͧ Ἱ���� 㹷��������� column
            },
            title: {
                text: 'Graph showing the number of visitors (Age)' //��Ǣ�ͧ͢��ҿ
            },
            subtitle: {
                text: 'Leelawadee Nan Museum'
            },
            xAxis: {
                categories: ['<?= implode("','", $month); //�ӵ���� array ᡹ x ����� 㹷������ ��͹?>']
            },
            yAxis: {
                title: {
                    text: 'Number of visitors (people)' //��Ǣ�͡�ҿ�ǵ��
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'people';
                }
            },
	legend: { //��駤�ҵ��˹觤�ҵ���âͧ��
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
                     data: [<?= implode(',', $child)    ?>] },
				 {name: 'Teens',
					 data: [<?= implode(',', $teens)    ?>] },
				 {name: 'Adult',
					 data: [<?= implode(',', $adult)    ?>] },
				 {name: 'Old',
					data: [<?= implode(',', $old)    ?>] }

			 ]
        });
    });
        </script>
    </head> 

    <body> 
      <div id="container" style="min-width: 320px; height: 380px; margin: 0 auto"></div>       
    </body>
</html>