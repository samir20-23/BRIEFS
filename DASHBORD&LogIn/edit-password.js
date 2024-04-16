let submit = document.getElementById("submit");
let inputs = document.querySelectorAll("input");

//err
let errpassword = document.getElementById("errpassword");
let errcpassword = document.getElementById("errcpassword");
let verified = document.getElementById("verified");
//elements
  let password = document.getElementById("password");
  let cpassword = document.getElementById("cpassword");
  let loader =document.querySelector(".loader");

  //clear
 function clear() {
      [ errpassword, errcpassword , verified].forEach(function (e) {
        e.innerHTML = "";
        e.style.color = "red";
      });
    }

submit.addEventListener("click", function () {

  let request = new XMLHttpRequest();
  request.open("POST", "edit-password.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
      "password=" +
      password.value +
      "&cpassword=" +
      cpassword.value
  );
  request.responseType = "document";
  request.onload = () => {
    response = request.response.body.innerHTML;
   console.log(response);

   
    
    if (response.trim().toLowerCase() == "passwordempty") {
      loader.style.display="none";
        clear();
        errpassword.innerHTML = "password is empty!";
      }
      else if (response.trim().toLowerCase() == "paasswordlenght") {
        loader.style.display="none";
        clear();
        errpassword.innerHTML = "to short !";
      } 
      
      else if (response.trim().toLowerCase() == "notmatch") {
        loader.style.display="none";
        clear();
        errcpassword.innerHTML = "passwords not match!";
      }
      
      else if ( response.trim().toLowerCase() == "passwordbad") {
        loader.style.display="none";
        clear();
        verified.innerHTML = "Enter a stronger password!";
      }
      
      else if ( response.trim().toLowerCase() == "emaildb") {
        loader.style.display="none";
      clear();
      verified.innerHTML = "Invalid password address!<a href='forgot.html'>forgot password !</a>";
    }
    
    else if (response.trim().toLowerCase() == "notverified") {
      loader.style.display="none";
      clear();
      verified.innerHTML = "error 404!";
      verified.style.color="red";
      verified.style.textShadow="1px 1px 12px #e7422c";
      setTimeout(function () {
        window.location.replace("error404.php");
    }, 999);
      
    } 
    
    else if (response.trim().toLowerCase() == "verified") {
      loader.style.display="block";
      clear();
      let iconVerified = document.createElement("img");
      iconVerified.setAttribute("src", "imgs/check.gif");
      iconVerified.id="iconVerified";
      verified.appendChild(iconVerified);
      setTimeout(function () {
        window.location.replace("log-in.html");
    }, 1111);
 
    }
  }; //onload
  loader.style.display="block";}); //click
  inputs.forEach(inputs => {
  inputs.addEventListener("input", function() {
clear();
// document.write("clear")
});
})


// /////////////
// echo "verified";

// }else{
//    echo "passwordbad";
// }

// }else{
// echo "emaildb";
// }

// }catch(PDOException $e){echo "notverified".$e->getMessage();}
// }else{
// echo "notmatch";
// }
// }else{echo "paasswordlenght";}
// }else{
// echo "passwordempty";
// }
// }
