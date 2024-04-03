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
                        $con = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
                        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $select = $con->query("SELECT email,password FROM $tbname WHERE email='$email'");
                        $slt = $select->fetch();
                        if($slt && $slt["email"]==$email){

                                         $sql = "UPDATE $tbname SET password='$password' WHERE email='$email'";
                                          $stmt = $con->prepare($sql);
                                          $stmt->execute();
                                          $edite = $stmt->rowCount();
                                          if($edite >0){
                                            header("location:log-in.html");
                                            $_SESSION['emailsession']='';
                                          }else{
                                            echo "chenge this password";
                                          }

                                    }else{
                                        if(  $_SESSION['emailsession']==''){
                                            echo "is aready edite";

                                            echo " <a href='log-in.html' style='text-decoration: none;'>log-in! </a>";
                                        }else{
                                             echo 'emailnottb';        
                                        }



                                    }

                    }catch(PDOException $e){echo "note connect".$e->getMessage();}
        }else{
            echo "notmatch";
        }
    }else{echo "passwordLen";}
    }else{
        echo "passwordempty";
    }
}
    ?>