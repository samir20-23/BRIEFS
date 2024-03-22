<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    function filterdata($data){
        $data=htmlspecialchars($data);
        $data=stripcslashes($data);
        $data=trim($data);
        return $data;

    }
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && !empty($_POST['password'])){
           

            /**/
            $user="SAMIR";
            $pass="samir123";
            $dataBaseName="login";
            $tableName="users";
            /**/
            
            
            /**/
            $email = filterdata($_POST['email']);
            $password = filterdata($_POST['password']);
            /*❌✅*/
            
            try{
            

            $con = new PDO("mysql:host=localhost;dbname=$dataBaseName",$user,$pass);
            $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

            $select = $con->query("SELECT email,password FROM $tableName WHERE email='$email'");
            $slt = $select->fetch();

            if(!empty($slt) && $password==$slt['password']){
                echo "IS LOG IN✅";
            }
/**/
         
            else{
                echo "<span style='color:red;'>note log in❌</span>";
            }
    



        }catch(PDOException $e ){echo "note connected ❌❌", $e->getMessage();}
    }
}
?>