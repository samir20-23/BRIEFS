<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "all.php";
    

    if (!empty($_POST['username'])) {
        $username = filter($_POST['username']);


        if (!empty($_POST["email"])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST["email"]) >= 13) {

                $email = filter($_POST['email']);

                if (!empty($_POST['password'])) {

                    if (strlen($_POST['password']) >= 5) {
                        // password_hash(filter($_POST["password"]),PASSWORD_DEFAULT); delete the then line 18
                        $password = filter($_POST['password']);

                        if ($_POST['password'] === $_POST['cpassword']) {


                            try {
                                $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

                                $select = $connect->query("SELECT username , email FROM $tbname WHERE email='$email'");
                                $slt = $select->fetch();

                             
                             
                                if ($slt && $email === $slt['email']) {

                                    echo "emaildb";

                                    // echo "emailaready";
                                } else {

                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $insert = $connect->prepare("INSERT INTO $tbname(username,email,password) VALUE(:username, :email,:password)");

                                    $insert->bindParam(":username", $username);
                                    $insert->bindParam(":email", $email);
                                    $insert->bindParam(":password", $password);

                                    $insert->execute();

                                    $verified = "verified";
                                    echo $verified;
                                //signupdb
                                      //select
                                      //$selected ="INSERT INTO $tbnamedashbord(id , logIn , singUp ) VALUES(0 , 0 , 0)"; $connect->exec($selected);
                                    $selectsingupdb =  $connect->query("SELECT singUp FROM $tbnamedashbord ");
                                    $signupnumber = $selectsingupdb->fetch();
                                    $number = $signupnumber['singUp'];

                                    
                                     //add
                                     if($verified == "verified"){  
                                     $number++;
                                     //update                                  
                                     $updatesingup = "UPDATE $tbnamedashbord SET singUp='$number'";
                                     $stmt = $connect->prepare($updatesingup);
                                     $stmt->execute();
                                              }

                                //signupdb
                           
                                }
                            } catch (PDOException $e) {
                                echo "notverified" . $e->getMessage();
                            }
                        } else {
                            echo "notmatch";
                        }
                    } else {
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
