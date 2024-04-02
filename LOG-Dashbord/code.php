<?php

session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){


    include "all.php";
    try{

   if(!empty($_POST["code"])){
        $codecheck = filter($_POST["code"]);

        if (isset($_SESSION["codesession"]) && $_SESSION["timesession"]){
            $codesession = $_SESSION["codesession"];
        }
        else{
            echo "error in the server";
        }

// if(isset($_POST["divtime"])){
//     echo "///yes///";
// }else{
//     echo "///no////";
// }

    if( $codecheck == $codesession ){
        
                 $_SESSION["codesession"]="";
                echo "coccect";
                header("location:mend.html");
                
        }else{
            echo "code not exact";
        }
        //#########timedifference
    }else{
        echo "codeempty";
    }

    }catch(Exception $e){echo "error: " . $e->getMessage();}
 
}

?>
