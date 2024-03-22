<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    function filterdata($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;}

    if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['password'])){


        $dbname = "login_breaf";
        $email    = filterdata($_POST['email'   ]);
        $password = filterdata($_POST['password']);
       try{

        $con = new PDO("mysql:host=localhost;dbname=$dbname", "SAMIR" , "samir123");
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        $select = $con->query("SELECT email, password FROM logs WHERE email='$email' ");
        $slt = $select->fetch();

        if(!empty($slt) && $password == $slt["password"]){
            echo "log in";
        }
        else{
            echo "note log in";
        }

     

       }catch(PDOException $e){ echo "note connect";}
    }
    else{
        echo "<p>* FILL THE FORM *</p>";
    }
}


?>