<?php 
   require_once 'connect.php' ;
   date_default_timezone_set("Asia/Bangkok");
    $busnoplus = 1 ;
    $bnp = 1; 
    $counter = 0 ;
    $day =  ($counter).' day';
    $datereg = date("Y-m-d" , strtotime($day));
    
    

        $sql = "SELECT busno  FROM regisdriver WHERE timestatus = 2 AND timeend =(SELECT MAX(timeend) FROM regisdriver WHERE datereg = (CURDATE()- INTERVAL 1 DAY) AND timestatus = 2)  LIMIT 1   ";
        $result = mysqli_query($connection,$sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              
                   while ($busnoplus <= 12){
                        $aaa = $row['busno'] ;
                        if($aaa + $busnoplus <= 26){
                          
                            $sql2 = "UPDATE busreal SET busline = 3 WHERE busno = $aaa+$busnoplus  AND busno <= 26  ";
                           
                   
                           
                            echo "TRUE" ;
                            
                        }else if($aaa + $busnoplus > 26){
                          
                            $sql2 = "UPDATE busreal SET busline = 3 WHERE busno = $bnp  AND busno <= 26  ";
                           
                            echo "FALSE" ; 
                            $bnp ++ ;
                        }
                        echo $aaa+$busnoplus ."<br>";
                        //$sql2 = "UPDATE busreal SET busline = 3 WHERE busno = $aaa  AND busno <= 26  ";
                        $busnoplus++ ;
                    }

               
                echo "busno: " . $row['busno'] . "<br>";
                while($bnp <= $row['busno']){
                    if($bnp % 2 != 0){
                        $day =  ($counter).' day';
                        $datereg = date("Y-m-d" , strtotime($day));
                        $sql3 = "UPDATE busreal SET busline = 1 WHERE busno = $bnp  AND busno <= 26  ";
                        $sql4 = "INSERT INTO regisdriver(busno,datereg,timestatus,firstqueue) 
                        VALUES ($bnp ,'$datereg', 0 , 1)";
                        $result2 = mysqli_query($connection,$sql3);
                        $resultx= mysqli_query($connection,$sql4);
                        echo "ODD Number ";
                        $counter ++;
                    }else{
                        $day =  ($counter).' day';
                        $datereg = date("Y-m-d" , strtotime($day));
                        $sql3 = "UPDATE busreal SET busline = 2 WHERE busno = $bnp AND busno <= 26  ";
                        $sql4 = "INSERT INTO regisdriver(busno,datereg,timestatus,firstqueue) 
                        VALUES ($bnp ,'$datereg', 0 , 1)";
                        $result2 = mysqli_query($connection,$sql3);
                        $resultx= mysqli_query($connection,$sql4);
                        echo "Even Number ";
                        $counter ++;
                    }
                    
                   
                    $bnp ++; 
                    echo "THREE" ;
          
            }
            echo " END " ; 
      
            }
        } else {
            echo "0 results";
        }
        
      

    


    
    
/*


    $sql ="UPDATE busreal SET busline = 1 WHERE (busno % 2) != 0 AND busno <= 26 ";
    $sql ="UPDATE busreal SET busline = 2 WHERE (busno % 2) != 0 AND busno <= 26 ";


    $sql ="UPDATE busreal SET busline = 3 WHERE (busno % 2) != 0 AND busno <= 26 ";*/
/*
    $sql2 ="SELECT busno,busstatus FROM busreal 
    WHERE (busno % 2) != 0  AND busline = 2";
    //สายหอใน
    $sql3 ="SELECT busno,busstatus FROM busreal 
    WHERE busstatus = 0  AND busline = 3";*/

    
    
  
    
 
   
   /* $result2 = mysqli_query($connection,$sql2); 
    $result3 = mysqli_query($connection,$sql3); */
   
    
   /*
   if(mysqli_num_rows($result) == 0) {
       require_once 'busqueue.php'; 
       $result2 = mysqli_query($connection,$sql2);
   } else {
       $result2 = mysqli_query($connection,$sql2);
   }
   */



?>