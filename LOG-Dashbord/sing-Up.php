<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
include "all.php";
    if (!empty($_POST['username'])) {
        $username = filter($_POST['username']);

 
            if(!empty($_POST["email"])){
       if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST["email"]) >=13) {
           
            $email = filter($_POST['email']);

            if (!empty($_POST['password'])) {
                
                if( strlen($_POST['password']) >= 5){
                $password = filter($_POST['password']);

                if ($_POST['password'] === $_POST['cpassword']) {
                        

                    try {
                        $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                        
                        $select = $connect->query("SELECT username , email FROM $tbname WHERE email='$email'");
                        $slt = $select->fetch();
                        if ($slt && $email === $slt['email']) {
                         
                         echo '<p style=" text-align: center; font-size:25px;" >
                             this email is aready <a href="log-in.html">Log-in</a>
                           </p>';
                         
                        // echo "emailaready";
                        }else{
                        
                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $insert = $connect->prepare("INSERT INTO $tbname(username,email,password) VALUE(:username, :email,:password)");
                        
                        $insert->bindParam(":username",$username);
                        $insert->bindParam(":email",$email);
                        $insert->bindParam(":password",$password);

                        $insert->execute();
                         echo "verified";
                         header("location:log-in.html");
                        }

                    } catch (PDOException $e) {
                        echo "note connect" . $e->getMessage();
                    }
                } else {
                    echo "notmatch";
                }
            }else{
                echo "paasswordlenght";
            }
            } else {
                echo "passwordempty";
            }
         } else {
            echo "emailbad";
        }
        } else {
            echo "emailempty";
        }
    } else {
        echo "userempty";
    }
}
