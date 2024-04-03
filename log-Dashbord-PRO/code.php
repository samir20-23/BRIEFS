<?php

    session_start();


if($_SERVER['REQUEST_METHOD']=="POST"){


    include "all.php";
    try{

   if(!empty($_POST["code"])){
        $codecheck = filter($_POST["code"]);

         
        if (isset($_SESSION["codesession"]) && $_SESSION["timesession"]){
            $codesession = $_SESSION["codesession"];
            $timesession = $_SESSION["timesession"];
        }
        else{
            echo "error in the server";
        }

        //timedifference
        $timedifference = $time - $timesession;

if($timedifference <= 1){  
    $codesession = $_SESSION["codesession"];
}else{
    $codesession = '';
    echo "Late ";
    echo " <a href='forgot.html' style='text-decoration: none;'>Send code Again </a>";
}

    if( $codecheck == $codesession ){
                echo "coccect";
                header("location:edite.html");
                $timedifference=0;
                // $_SESSION["codesession"]='';
        }else{
            echo "code to exact";

        }
        //#########timedifference
    }else{
        echo "codeemaoty";
    }

    }catch(Exception $e){echo "error: " . $e->getMessage();}
 
}

?>
