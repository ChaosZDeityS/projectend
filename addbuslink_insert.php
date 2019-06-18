<?php 
    require_once "connect.php" ; 
    $buslineid = $_GET['buslineid'] ;
    $_SESSION["buslineid"] = $buslineid ;
    //$busstopid = $_GET['busstopid'] ;  
    $datelink = date("Y-m-d"); 
 

    $busstopid = isset($_GET['link'] )? $_GET['link'] : array() ; 
    $_SESSION["busstopid"] = $busstopid ;
    
    foreach($_GET['link'] AS $busstopid){

     $sql = "INSERT INTO temp_linkbuslineandbusstop (buslineid,busstopid,datelink)
     VALUES ('$buslineid','$busstopid','$datelink') ";
     $result = mysqli_query($connection,$sql) ;

     if($result){
       // $_SESSION['errormsg'] = "การอัพเดทจัดการสถานีประจำสาย " .$buslineid."    ". "เสร็จสิ้น";
        header("location: addlinkmap.php") ;
        
     }else{
       // $_SESSION['errormsg'] = "การจัดการล้มเหลวกรุณาตรวจสอบอีกครั้ง " ;
        header("location: addlink.php") ;
     }
    
    }

   
   

  




?>