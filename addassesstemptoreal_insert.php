<?php 
    session_start();
    require_once "connect.php" ; 
    
    //$buslineid = $_GET['buslineid'] ;
    
    //$busstopid = $_GET['busstopid'] ;  
    //$datelink = date("Y-m-d"); 

    //$busstopid = isset($_GET['link'] )? $_GET['link'] : array() ; 
    


     $sql = "INSERT INTO selectassessbus (questionno,noq,dateselect) SELECT questionno,noq,dateselect FROM temp_selectassessbus";
     $result = mysqli_query($connection,$sql) ;

     if($result){
       
        $sql2 = "TRUNCATE TABLE temp_selectassessbus" ; 
        $result2 = mysqli_query($connection,$sql2);
        if($result2){
             $_SESSION['errormsg'] = "การสร้างชุดข้อมูลเสร็จสิ้น ";
        header("location: manageassess.php") ;

        }else{
            

        }
        
     }else{
        $_SESSION['errormsg'] = "การจัดการล้มเหลวกรุณาตรวจสอบอีกครั้ง " ;
       header("location: manageassess.php") ;
     }

    
    



   
   

  




?>