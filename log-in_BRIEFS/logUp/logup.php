<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    function filterdata($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    if(!empty($_POST['fullname']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['username']) && $_POST['password']  == $_POST['cpassword'] && !empty($_POST['checkbox'])){


        $dbname = "login_breaf";

        $fullname = filterdata($_POST['fullname']);
        $username = filterdata($_POST['username']);
        $email    = filterdata($_POST['email'   ]);
        $password = filterdata($_POST['password']);
       try{

        $con = new PDO("mysql:host=localhost;dbname=$dbname", "SAMIR" , "samir123");
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        $insert = $con->prepare("INSERT INTO logs(fullname,username,email,password) VALUES(:fullname,:username,:email,:password)");

        $insert->bindParam(':fullname',$fullname);
        $insert->bindParam(':username',$username);
        $insert->bindParam(':email',$email);
        $insert->bindParam(':password',$password);

        $insert->execute();

        
           

        echo "connect";


       }catch(PDOException $e){ echo "note connect";}


    }
    
    else{
        echo "<p>* FILL THE FORM *</p>";
    }
}
?>

