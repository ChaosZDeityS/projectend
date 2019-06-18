<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");


    include('config.ini.php');

    // $sql="SELECT * FROM busstop ";
    $sql="SELECT linkemer.buslineid, busline.buslinename, linkemer.pointemer
          FROM (linkemer
          INNER JOIN busline ON linkemer.buslineid = busline.buslineid)
          WHERE linkemer.buslineid=1";
    $result=mysqli_query($con,$sql);

    $arr=array();
    while($row=mysqli_fetch_assoc($result)){
        $arr[]=$row;
    }
    mysqli_close($con);
    echo json_encode($arr);

?>