<?php 
    require_once "connect.php" ; 
    $busstopname = $_REQUEST['busstopname'] ;
    $busstopnameTH = $_REQUEST['busstopnameTH'] ;
    $latitude = $_REQUEST['latitude'] ;
    $longtitude = $_REQUEST['longtitude'] ;

    //$busstopid = $_GET['busstopid'] ;  

 


    

     $sql = "INSERT INTO busstop (busstopname,busstopnameTH,latitude,longtitude)
     VALUES ('$busstopname','$busstopnameTH','$latitude','$longtitude') ";
     $result = mysqli_query($connection,$sql) ;

     if($result){
      //  header("location : managestation.php");
        
        
     }else{
       // $_SESSION['errormsg'] = "การจัดการล้มเหลวกรุณาตรวจสอบอีกครั้ง " ;
        echo "FAILED" ;
     }
    


   
   

  




?>