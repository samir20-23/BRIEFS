let submit = document.getElementById("submit");
let erremail = document.getElementById("erremail");
let errpassword = document.getElementById("errpassword");
let verified = document.getElementById("verified");




submit.addEventListener("click", function () {
  //Element
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  //errors elements

  let request = new XMLHttpRequest();
  request.open("POST", "log-in.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    
      "email=" +
      email +
      "&password=" +
      password 
  );
  request.responseType = "document";
  request.onload = () => {
    response = request.response.body.innerHTML;
   
    function clear() {
      [ erremail, errpassword].forEach(function (e) {
        e.innerHTML = "";
        e.style.color = "red";
      });
    }
  
   if (response == "emaliempty") {
      clear();
      erremail.innerHTML = "email is empty!";
    }
    
    else if ( response == "emaildb" ||response == "emailbad") {
      clear();
      erremail.innerHTML = "Invalid email address!";
    }
    
    else if (response == "passwordempty") {
      clear();
      errpassword.innerHTML = "password is empty!";
    }
  
    else if (response == "pasworddb") {
      clear();
      errpassword.innerHTML = "Invalid email address!";
    }
    
    else if (response == "notverified") {
      clear();
      verified.innerHTML = "error 404!";
      verified.style.color="red";
      verified.style.textShadow="1px 1px 12px #e7422c";
      setTimeout(function () {
        window.location.replace("error404.php");
    }, 10);
      
    }
    
    else if (response == "verified") {
      clear();

      let iconVerified = document.createElement("img");
      iconVerified.setAttribute("src", "imgs/check.gif");
      iconVerified.id="iconVerified";
      verified.appendChild(iconVerified);

      setTimeout(function () {
        window.location.replace("DASHBORD/DASHBORD.php");
    }, 990);
 
    }
  }; //onload
}); //click

