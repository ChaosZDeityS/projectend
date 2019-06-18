<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>Simple Form1</title>
    </head>
    <body>
<?php
    // $data= $_GET["S"];
    // isset($_REQUEST['S']) ? $data = $_REQUEST['S'] : $data = '';
    // error_reporting( error_reporting() & ~E_NOTICE );
    
    // $da = $_REQUEST["Test"];
    $dataScore = "";
    $da = "";
    if (isset($_REQUEST["score1"])){
        $da = $_REQUEST["score1"];
    }
    $dataa = "doi";
    echo " ".$dataa;
    echo "<br/>data: ".$da;
    
    // echo " ".$data;
?>
    </body>
</html>