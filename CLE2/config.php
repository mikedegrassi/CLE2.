<?php


$host       = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'kapper';

$db = mysqli_connect($host, $username, $password, $database)
or die('Error: '.mysqli_connect_error());


?>