<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");


    include('config.ini.php');

    // $sql="SELECT buslineid, busstopid FROM linkbuslineandbusstop ";
    $sql="SELECT linkbuslineandbusstop.buslineid, busline.buslinename, busstop.busstopid, busstop.busstopname, busstop.busstopnameTH, busstop.latitude, busstop.longtitude, buslineinout.lineinout
          FROM (((linkbuslineandbusstop
          INNER JOIN busline ON linkbuslineandbusstop.buslineid = busline.buslineid)
          INNER JOIN buslineinout ON linkbuslineandbusstop.idbuslineinout = buslineinout.idbuslineinout)
          INNER JOIN busstop ON linkbuslineandbusstop.busstopid = busstop.busstopid)";
    $result=mysqli_query($con,$sql);

    $arr=array();
    while($row=mysqli_fetch_assoc($result)){
        $arr[]=$row;
    }
    mysqli_close($con);
    echo json_encode($arr);

?>