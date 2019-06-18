<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

mysqli_set_charset($connection,"utf8");
$select_db = mysqli_select_db($connection, 'busproject');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}