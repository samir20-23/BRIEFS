<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    function filterdata($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    if(!empty($_POST['username']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['password']  == $_POST['cpassword'] ){


        $user="SAMIR";
        $pass="samir123";
        $dataBaseName="login";
        $tableName="users";


        $username = filterdata($_POST['username']);
        $email    = filterdata($_POST['email'   ]);
        $password = filterdata($_POST['password']);
       try{

        $con = new PDO("mysql:host=localhost;dbname=$dataBaseName", "$user" , "$pass");
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        $insert = $con->prepare("INSERT INTO $tableName(username,email,password) VALUES(:username , :email,:password)");

        $insert->bindParam(':username',$username);
        $insert->bindParam(':email',$email      );
        $insert->bindParam(':password',$password);

        $insert->execute();



        
           

      
            header("location:log-in.html");
        


       }catch(PDOException $e){ echo "note connect".$e->getMessage();}


    }
    
    else{
        echo "<p>* FILL THE FORM *</p>";
    }
}
?>

