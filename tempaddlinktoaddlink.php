<?php 
    session_start();
    require_once "connect.php" ; 
    
    //$buslineid = $_GET['buslineid'] ;
    
    //$busstopid = $_GET['busstopid'] ;  
    //$datelink = date("Y-m-d"); 

    //$busstopid = isset($_GET['link'] )? $_GET['link'] : array() ; 
    


     $sql = "INSERT INTO linkbuslineandbusstop (buslineid,busstopid,datelink) SELECT buslineid,busstopid,datelink FROM temp_linkbuslineandbusstop";
     $result = mysqli_query($connection,$sql) ;

     if($result){
       
        $sql2 = "TRUNCATE TABLE temp_linkbuslineandbusstop" ; 
        $result2 = mysqli_query($connection,$sql2);
        if($result2){
             $_SESSION['errormsg'] = "การอัพเดทจัดการสถานีประจำสาย " .$buslineid."    ". "เสร็จสิ้น";
        header("location: manangebuslineandbusstop.php") ;

        }else{
            

        }
        
     }else{
        $_SESSION['errormsg'] = "การจัดการล้มเหลวกรุณาตรวจสอบอีกครั้ง " ;
       header("location: addlink.php") ;
     }

    
    



   
   

  




?>