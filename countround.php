<?php 
function countround(){
require_once 'connect.php' ;

date_default_timezone_set("Asia/Bangkok");
$counttype= $_POST['counttype'];
$currentdate = date("Y-m-d");
$currentmonth = date("m");


if($counttype == "D"){
    $sql="SELECT busno,COUNT(*) AS sum FROM regisdriver WHERE datereg = CURDATE() - INTERVAL 1 DAY AND timestatus = 2 GROUP BY busno  " ;
    $result = mysqli_query($connection,$sql);
  
    if($row = mysqli_fetch_array($result) > 0) {
        echo "สรุปยอดขับรถประจำวันที่ " .$currentdate ;
         while($row = mysqli_fetch_array($result)){
      
        echo "หมายเลขรถเมล์คันที่  " .$row['busno'];  
        echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum']. "<br>";
    }
    }else{
      
        echo "สรุปยอดขับรถประจำวันที่ " .$currentdate ;
        echo " ไม่มียอดขับรถประจำวันที่ " .$currentdate ;
    }
    
}else if($counttype == "W"){
    $sql="SELECT busno,COUNT(*) AS sum FROM regisdriver WHERE YEARWEEK(datereg) = YEARWEEK(CURDATE()) AND timestatus = 2 GROUP BY busno  " ;
    $result = mysqli_query($connection,$sql);
    
    while($row = mysqli_fetch_array($result)){
      
        echo "หมายเลขรถเมล์คันที่  " .$row['busno'];
        echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum']."<br>" ;
    }

}else if($counttype == "M"){

    $sql="SELECT busno,COUNT(*) AS sum FROM regisdriver WHERE MONTH(datereg) = MONTH(CURDATE()) AND timestatus = 2 GROUP BY busno  " ;
    $result = mysqli_query($connection,$sql);
    if($currentmonth == "1"){
      echo " สรุปยอดขับรถประจำเดือน มกราคม <br>" ; 
    }else if($currentmonth == "2"){
      echo " สรุปยอดขับรถประจำเดือน กุมภาพันธ์ <br>" ;
    }else if($currentmonth == "3"){
      echo " สรุปยอดขับรถประจำเดือน มีนาคม <br>" ;
    }else if($currentmonth == "4"){
      echo " สรุปยอดขับรถประจำเดือน เมษายน <br>" ;
    }else if($currentmonth == "5"){
      echo " สรุปยอดขับรถประจำเดือน พฤษภาคม <br>" ;
    }else if($currentmonth == "6"){
      echo " สรุปยอดขับรถประจำเดือน มิถุนายน <br>" ;
    }else if($currentmonth == "7"){
      echo " สรุปยอดขับรถประจำเดือน กรกฎาคม <br>" ;
    }else if($currentmonth == "8"){
      echo " สรุปยอดขับรถประจำเดือน สิงหาคม <br>" ;
    }else if($currentmonth == "9"){
      echo " สรุปยอดขับรถประจำเดือน กันยายน <br>" ;
    }else if($currentmonth == "10"){
      echo " สรุปยอดขับรถประจำเดือน ตุลาคม <br>" ;
    }else if($currentmonth == "11"){
      echo " สรุปยอดขับรถประจำเดือน พฤศจิกายน <br>" ;
    }else if($currentmonth == "12"){
      echo " สรุปยอดขับรถประจำเดือน ธันวาคม <br>" ;
    }
   
    while($row = mysqli_fetch_array($result)){
        
        echo "หมายเลขรถเมล์คันที่  " .$row['busno'];
        echo "&nbsp;&nbsp;จำนวนรอบขับทั้งหมด  " .$row['sum']. "<br>";
}
}
}
?>