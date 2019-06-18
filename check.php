<?php
session_start();
if (!isset($_SESSION['userstaff'])){
    header( "location: login.php" );
     
    
}

else{
   
}
?>