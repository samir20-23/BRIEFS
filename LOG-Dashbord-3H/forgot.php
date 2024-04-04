<?php

    session_start();


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD']=="POST"){

    include "all.php";
    if(!empty($_POST['email'])){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    
            
            
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
                                                         
                                                          echo "verified";

                                                        
                                        //hear send mailer
                                        
                }else{
                    echo "emaildb";
                    

                }
            }catch(PDOException $e){
                echo "notverified". $e->getMessage();
            }
       

    }else{
        echo "emailbad";
    }
}else{
    echo "emaliempty";
}
}
?>

