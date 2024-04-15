
<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "all.php";
     if(!empty($_POST['email']) ){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)&& strlen($_POST['email']) >= 13){
        $email= filter($_POST['email']);
        
        if(!empty($_POST['password'])){
            $password=filter($_POST['password']);
             
            try{
                $con=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $select = $con->query("SELECT username,email,password FROM $tbname WHERE email='$email'");
                $slt = $select->fetch();
                if($slt && $slt["email"]==$email){
                    // "connect email";
                   


                    
                    if($slt && $slt["password"]==$password && strlen($password) >= 5){
                            
                            $_SESSION["username"]=$slt["username"];
                            $_SESSION["useremail"]=$slt["email"]; 
                            
                            
                             //dashbord
                             $verified = "verified";
                             echo $verified ;
                                             //select

                                             
                                             $selectlogindb =  $con->query("SELECT logIn FROM $tbnamedashbord ");
                                             $loginnumber = $selectlogindb->fetch();
                                             $number= $loginnumber['logIn'];
                                             
                                             if($verified == "verified"){
                                                $number++;
                                                $update ="UPDATE $tbnamedashbord SET logIn='$number' ";
                                                $updatelogin = $con->prepare($update);
                                                $updatelogin->execute();}
         
                                             //dashbord
                                              
                    }else{
                        echo "pasworddb";
                       
                    }
                }else{
                    echo "emaildb";
                }
            }catch(PDOException $e){
                echo "notverified". $e->getMessage();
            }
        }else{
            echo "passwordempty";
        }

    }else{
        echo "emailbad";
    }
}else{
    echo "emaliempty";
}
}
?>