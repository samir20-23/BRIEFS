<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $mail = new PHPMailer(true);


    include "all.php";

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {


            $email = filter($_POST['email']);

            try {
                $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $select = $con->query("SELECT username,email FROM $tbname WHERE email='$email'");
                $slt = $select->fetch();
                if ($slt && $slt["email"] == $email) {

                    $username = $slt["username"];

                    $_SESSION["codesession"] = $code;
                    $_SESSION["emailsession"] = $email;

                    //hear send mailer



                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = $usernamemailer;
                    $mail->Password = $passwordmailer;
                    $mail->SMTPSecure = "ssl";
                    $mail->Port = 465;
                    $mail->setFrom($usernamemailer, "DASHBORD");
                    $mail->addAddress($email);
                    $mail->Subject = "BASHBORD";
                    $mail->isHTML(true);
                    $style = "
    <body  style='
    height:70vh; 
    border-radius: 22px;
    display: flex;
    justify-content: center;
    
    '>
    
    <div class='to' style=' margin-top:15px;  width: 300px;
    height: 270px;
    background-size: cover;
    background-repeat: no-repeat;
    font-size: 20px;
    border-radius: 22px;
    text-align: center;
    background-color:#ff991f;
    box-shadow: 0 0 10px 2px  #ff991f;
    ' >
    
       <div>hello $username</div>
      <p style='
        margin: 5px 0 -5px;
         text-align: center;
      background-color: rgba(204, 204, 204, 0.464);text-shadow:0 0 12px  #163874;' >
       this your code keep a the  code :
         <hr>
        <span style='        color: red;
        text-shadow: 0 0 1px black; background:black; border:2px solid yellow;' >$code</span> 
      </p>
    </div>
  </body>
                                                        ";
                    $mail->Body = $style;
                    $mail->send();





                    //select

                    $verified = "verified";
                    $selectforgotdb =  $con->query("SELECT forgot FROM $tbnamedashbord ");
                    $forgotnumber = $selectforgotdb->fetch();
                    $number = $forgotnumber['forgot'];

                    if ($verified == "verified") {
                        $number++;
                        $update = "UPDATE $tbnamedashbord SET forgot='$number' ";
                        $updateforgot = $con->prepare($update);
                        $updateforgot->execute();
                    }

                    //dashbord

                    echo "verified";
                    //hear send mailer

                } else {
                    $_SESSION["emailsession"] = "";
                    echo "emaildb";
                }
            } catch (PDOException $e) {
                echo "notverified" . $e->getMessage();
            }
        } else {
            echo "emailbad";
        }
    } else {
        echo "emaliempty";
    }
}
