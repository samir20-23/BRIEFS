<?php
if (session_status() !== PHP_SESSION_NONE) {
    session_start();
}

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

                                    // $sql = "UPDATE $tbname SET password='$password' WHERE email='$email'";

                                    //       $stmt = $conn->prepare($sql);
                                    //       $stmt->execute();
                                    //       echo $stmt->rowCount() . " records UPDATED successfully";

                                    echo "connect";


                        echo $email;
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