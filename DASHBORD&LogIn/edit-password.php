<?php

 session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
include "all.php";
    if(!empty($_POST['password'])){
        if(strlen($_POST['password']) >=5){
            $password = filter($_POST["password"]);
        if(!empty($_POST['cpassword']) && $_POST['cpassword'] === $_POST['password'] ){
            $cpassword = filter($_POST["cpassword"]);
            //session 
            $email = $_SESSION['emailsession'];
            //###sesion
                    try{
                        $con = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $select = $con->query("SELECT password,email FROM $tbname   WHERE email='$email'");
                        $slt = $select->fetch();
                        if($slt && $email == $slt["email"]){

                            if($slt && $password !== $slt["password"] && strlen( $password ) >= 5){

                                $sql = "UPDATE $tbname SET password='$password' WHERE email='$email'";
                                $stmt = $con->prepare($sql);
                                $stmt->execute();

                                echo "verified";
                                $verified = "verified";
                                //select view 
                                $select = $con->query("SELECT editpassword FROM $tbnamedashbord ");
                                $fetcheditpassword = $select->fetch();
                                $number = $fetcheditpassword["editpassword"];
                                if($verified == "verified"){
                                 $number++;
                                 $update = "UPDATE $tbnamedashbord SET editpassword='$number'";
                                 $updateeditpassword = $con->prepare($update);
                                 $updateeditpassword->execute();
                                } 

                            }else{
                               echo "passwordbad";
                            }

                        }else{
                            echo "emaildb";
                        }

                    }catch(PDOException $e){echo "notverified".$e->getMessage();}
        }else{
            echo "notmatch";
        }
    }else{echo "paasswordlenght";}
    }else{
        echo "passwordempty";
    }
}

  
    
