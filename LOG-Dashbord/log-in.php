
<?php
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

                $select = $con->query("SELECT email,password FROM $tbname WHERE email='$email'");
                $slt = $select->fetch();
                if($slt && $slt["email"]==$email){
                    // "connect email";
                   

                    
                    if($slt && $slt["password"]==$password && strlen($password) >= 5){
                            echo "connect";  
                            header("location:DASHBORD/DASHBORD.html");                     
                    }else{
                        echo "paswordnoteindb :";
                        echo " <a href='forgot.html' style='text-decoration: none;'>Forgot password?</a>";
                    }
                }else{
                    
                    echo "emailnoteindb";
                    echo "<a href='sing-Up.html'>Sign-Up</a>";
                }
            }catch(PDOException $e){
                echo "note connecvt dataabase". $e->getMessage();
            }
        }else{
            echo "Passwordempty";
        }

    }else{
        echo "Emailbad";
    }
}else{
    echo "Emaliempty";
}
}
?>