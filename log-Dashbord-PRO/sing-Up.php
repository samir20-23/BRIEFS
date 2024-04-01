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
                         
                         echo '
                         <style>
                          .to{
                            animation: messageforgot 0.9s linear alternate ;
                          }
                          @keyframes messageforgot {
                            0%{margin-top: -100px;}
                            100%{margin-top: 0px;}
                            
                          }
                        </style>
                         <body  style=" 
                         display: flex;
                         justify-content: center;" >
                         <div class="to" style="   width: 600px;
                         height: 50px;
                         background-color: rgba(255, 0, 0, 0.50);
                         font-size: 20px;
                         border-radius: 0px 0px 9px 9px;
                         box-shadow: 0 0 2px 0.5px rgba(255, 0, 0, 0.50);" >
                           <p style=" text-align: center;" >
                             this email is aready <a href="log-in.html">Log-in</a>
                           </p>
                         </div>
                       </body>';
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
