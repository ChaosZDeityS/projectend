<?php
    require_once 'c:/xampp/htdocs/vendor/autoload.php';

    use Ozdemir\Datatables\Datatables;
    use Ozdemir\Datatables\DB\MySQL;

    $config = [ 'host'     => 'localhost',
                'port'     => '3306',
                'username' => 'root',
                'password' => '',
                'database' => 'busproject' ];

    $dt = new Datatables( new MySQL($config) );

    $dt->query("SELECT busno,busid,busline,seat  FROM bus");

    
    

    echo $dt->generate();
?>