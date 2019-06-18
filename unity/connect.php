<?php

define("servername", "localhost");  
define("username", "root");
define("password", "");
define("db_name", "dbname");  

$mysqli = new mysqli(servername,username,password,db_name);

$mysqli->set_charset("utf8")

?>