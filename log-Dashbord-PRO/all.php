<?php

function filter($data){
    $data = htmlspecialchars($data);
    $data =trim($data);
    $data= stripslashes($data);
    return $data ;
}
$host = "localhost";
$user = "SAMIR";
$dbname="login";
$pass="samir123";
$tbname="myadmin";

$code = mt_rand(99999,999999);
$time = date('i');

