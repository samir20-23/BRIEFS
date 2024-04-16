<?php

session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){


    include "all.php";
    
    if(!empty(filter($_POST["code"]))){

     $codecheck = filter($_POST["code"]);
  
        if (isset($_SESSION["codesession"])){
            $codesession = filter($_SESSION["codesession"]);
        }
        else{
            echo "notsend";
        }

  try{
    if( $codecheck == $codesession ){
        
                 $_SESSION["codesession"]="";
                 
                $con=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
                $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                echo "verified";
                $verified = "verified";
                $selectmailercode = $con->query("SELECT mailercode FROM $tbnamedashbord ");
                $fetchmailercode = $selectmailercode->fetch();
                $number = $fetchmailercode["mailercode"]; 

                if($verified == "verified"){
                    $number++;
                    $update = "UPDATE $tbnamedashbord SET mailercode='$number'";
                    $updatemailercode = $con->prepare($update);
                    $updatemailercode->execute();
                }

        }else{
            echo "notexact";
        }
        //#########timedifference
    }catch(Exception $e){echo "notverified" . $e->getMessage();}
    }else{
        echo "codeempty";
    }

    
 
}

?>
