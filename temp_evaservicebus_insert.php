<?php 
    session_start();
    require_once "connect.php" ; 
    //$id = $_GET['id'] ;
    //$_SESSION["buslineid"] = $buslineid ;
    //$busstopid = $_GET['busstopid'] ;  
    $dateselect = date("Y-m-d"); 
 

    $noq = $_GET['noq'];
    $_SESSION["noq"] = $noq ;
    $id = isset($_GET['link'] )? $_GET['id'] : array() ; 
    foreach($_GET['link'] AS $id){

     $sql = "INSERT INTO temp_selectassessbus (questionno,noq,dateselect)
     VALUES ('$id','$noq','$dateselect') ";
     $result = mysqli_query($connection,$sql) ;

     if($result){
//$_SESSION['errormsg'] = "การอัพเดทจัดการสถานีประจำสาย " .$buslineid."    ". "เสร็จสิ้น";
        header("location: addassesstemptoreal.php") ;
      //  echo "OK : " .$id ;
         
        
     }else{
       // $_SESSION['errormsg'] = "การจัดการล้มเหลวกรุณาตรวจสอบอีกครั้ง " ;
       // header("location: addlink.php") ;
      // echo "FAIL"  ;
     }
    
    }

   
   

  




?>