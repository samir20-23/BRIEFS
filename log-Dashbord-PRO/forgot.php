<?php

    session_start();

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD']=="POST"){

    include "all.php";

    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        if(!empty($_POST['email'])){
            
            
        $email= filter($_POST['email']);
       
            try{
                $con=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $select = $con->query("SELECT email FROM $tbname WHERE email='$email'");
                $slt = $select->fetch();
                if($slt && $slt["email"]==$email){
                    
                      $_SESSION["codesession"]=$code;
                      $_SESSION["timesession"]= $time;
                      $_SESSION["emailsession"]=$email;

                                        //hear send mailer
                                                           header("location:code.html");
                                                          echo "mailer";
                                        //hear send mailer
                }else{
                    echo "emailnoteindb";
                    echo "<a href='sing-Up.html'>sing-Up</a>";

                }
            }catch(PDOException $e){
                echo "note connecvt dataabase". $e->getMessage();
            }
       
}else{
    echo "Emaliempty";
}
    }else{
        echo "emailbad";
    }
}
?>