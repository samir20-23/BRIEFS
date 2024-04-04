<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            height: 650px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #error404{
            width: 60%;
            height: 70vh;
            background:#ff991f ;
            padding: 30px;
            border-radius: 3px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        #error{
            width: 60%;
            padding: 20px;
            background: #dfe1e5;
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
             border-radius: 3px;
            box-shadow: -15px 15px 2px #ef994d;
        
        }
        #giferror{
            width: 50%;
            
            
        }
        #texterror h5{  
            font-size: 15px;
           
        }
    </style>
</head>
<body>
 <div id="error404" >
 
 <div id="error">
    <img id="giferror" src="imgs/giphy.gif" alt="">
    <div id="texterror">
    <h1>404</h1>
    <h5>	The requested page could not be found but may be available again in the future</h5></div>
</div>

</div>
</body>
</html>