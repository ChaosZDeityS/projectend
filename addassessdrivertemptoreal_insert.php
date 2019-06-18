<?php 
    session_start();
    require_once "connect.php" ; 
    
    //$driverlineid = $_GET['driverlineid'] ;
    
    //$driverstopid = $_GET['driverstopid'] ;  
    //$datelink = date("Y-m-d"); 

    //$driverstopid = isset($_GET['link'] )? $_GET['link'] : array() ; 
    


     $sql = "INSERT INTO selectassessdriver (questionno,noq,dateselect) SELECT questionno,noq,dateselect FROM temp_selectassessdriver";
     $result = mysqli_query($connection,$sql) ;

     if($result){
       echo "1"  ;
       
        $sql2 = "TRUNCATE TABLE temp_selectassessdriver" ; 
        $result2 = mysqli_query($connection,$sql2);
        if($result2){
             $_SESSION['errormsg'] = "การสร้างชุดข้อมูลเสร็จสิ้น ";
        header("location: manageassess.php") ;
        echo "2"  ;

        }else{
          echo "3"  ;

        }
        
     }else{
        $_SESSION['errormsg'] = "การจัดการล้มเหลวกรุณาตรวจสอบอีกครั้ง " ;
       header("location: manageassess.php") ;
       echo "4"  ;
     }

    
    



   
   

  




?>