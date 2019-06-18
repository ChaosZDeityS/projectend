<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");


    include('config.ini.php');

    $sql="SELECT * FROM selectassessbus INNER JOIN evaservicebus ON selectassessbus.questionno = evaservicebus.id WHERE selectassessbus.statusselectassess = 1";
    
    $result=mysqli_query($con,$sql);

    $arr=array();
    while($row=mysqli_fetch_assoc($result)){
        $arr[]=$row;
    }
    mysqli_close($con);
    echo json_encode($arr);

?>