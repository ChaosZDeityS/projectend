<?php 
    require_once "connect.php" ; 
   

  
       
        $sql2 = "TRUNCATE TABLE temp_selectassessbus" ; 
        $result2 = mysqli_query($connection,$sql2);
        header("location: manageassess.php");

    

   

  




?>