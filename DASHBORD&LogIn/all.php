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
 
//mailer

$code = mt_rand(99999,999999);

$usernamemailer = "germanysamir1@gmail.com";
$passwordmailer = "cbky ooci pmbx zhmh";

//sign up database

$tbnamedashbord = "view";
