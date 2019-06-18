<?php

$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=busproject', $username, $password );
$connection -> exec("SET CHARACTER SET utf8");
?>