<?php

session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){


    include "all.php";
    
    if(!empty($_POST["code"])){

     $codecheck = filter($_POST["code"]);
    try{

   

        if (isset($_SESSION["codesession"]) && $_SESSION["timesession"]){
            $codesession = $_SESSION["codesession"];
        }
        else{
            echo "notsend";
        }


    if( $codecheck == $codesession ){
        
                 $_SESSION["codesession"]="";
                echo "verified";
                
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
