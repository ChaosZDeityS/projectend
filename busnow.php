<?php 
include('connect.php');
date_default_timezone_set("Asia/Bangkok");

$datenow = date("d-m-Y");

$sql = "SELECT  groupbusstatus,COUNT(groupbusstatus) AS C FROM busreal GROUP BY groupbusstatus"  ;
$sql2 = "SELECT busline,COUNT(busline) AS BL FROM busreal GROUP BY busline" ;


$result = mysqli_query($connection,$sql) ; 
$result2 = mysqli_query($connection,$sql2);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "สรุปสถานะการให้บริการประจำวันที่&nbsp&nbsp" .$datenow. "<br><br>";
    
    while($row = mysqli_fetch_assoc($result)) {
      if($row['groupbusstatus'] == 1){
        $row['groupbusstatus'] = "สามารถให้บริการได้" ; 
      }else if($row['groupbusstatus'] == 2){
        $row['groupbusstatus'] = "ไม่สามารถให้บริการได้" ; 
      }
        echo "&nbsp&nbsp&nbsp&nbsp".$row["groupbusstatus"]. " จำนวน: " . $row["C"]. "  คัน <br>";
    }



      echo " <br>สายที่ให้บริการประจำวันที่ " .$datenow. "<br><br>";
      while($row = mysqli_fetch_assoc($result2)){
        if($row['busline'] == 1){
          $row['busline'] = "หน้ามอ-ตึก ICT" ; 
        }else if($row['busline'] == 2){
          $row['busline'] = "หน้ามอ-ตึกวิศวะ" ; 
        }else if($row['busline'] == 3){
          $row['busline'] = "หอใน" ; 
        }
        echo "&nbsp&nbsp&nbsp&nbspสาย".$row["busline"]. " ให้บริการประจำวันนี้ทั้งหมด : " . $row["BL"]. "  คัน <br>" ; 
        
      }
    }
    

else {
    echo "0 results";
}



// if(mysqli_num_rows($result) > 0){
//   echo " สายที่ให้บริการประจำวันที่ " .$datenow. "<br><br>";
//   while($row = mysqli_fetch_assoc($result)){
//     if($row['busline'] == 1){
//       $row['busline'] = "หน้ามอ-ตึก ICT" ; 
//     }else if($row['busline'] == 2){
//       $row['busline'] = "หน้ามอ-ตึกวิศวะ" ; 
//     }else if($row['busline'] == 3){
//       $row['busline'] = "หอใน" ; 
//     }
//     echo "&nbsp&nbsp&nbsp&nbspสาย".$row["busline"]. " จำนวน : " . $row["BL"]. "  คัน <br>" ; 
    
//   }
// }


mysqli_close($connection);


?>