<?php

$host  = 'localhost';
$user  = 'root';
$pass = '';
$db    = 'dolentok';

$connect = new mysqli($host, $user, $pass, $db);
if($connect->connect_error){
 echo 'Terjadi Kesalahan';
}

?>