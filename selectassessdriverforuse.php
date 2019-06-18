<?php 
    require 'connect.php'  ;
    $noq = $_GET['noq'] ;
    // echo $noq ;
    // $sql = "SELECT statusselectassess FROM selectassessdriver ";
    //$result = mysqli_query($connection,$sql);

  

    $sql2 = "UPDATE selectassessdriver SET statusselectassess = 0 WHERE statusselectassess = 1 " ;
    $result2 = mysqli_query($connection,$sql2);

    if($result2){

        $sql3 = "UPDATE selectassessdriver SET statusselectassess = 1 WHERE noq =  '$noq' " ;
        $result3 = mysqli_query($connection,$sql3);
    
        if($result3){

        }else{
            echo "FAIL UPDATE noq 1" ;
        }
        header("location:manageassessdriver.php");
    


    }else{
        echo "FAIL UPDATE STATUS" ; 
        
    }

   
?>