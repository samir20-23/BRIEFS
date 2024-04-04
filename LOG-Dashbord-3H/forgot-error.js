let submit = document.getElementById("submit");
let erremail = document.getElementById("erremail");
let verified= document.getElementById("verified");

submit.addEventListener("click",function(){
let email = document.getElementById("email").value;

let request = new XMLHttpRequest();
request.open("POST","forgot.php");
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "email="+email
)


request.responseType = "document";
request.onload = () => {
  action = request.response.body.innerHTML;
 console.log(action);
  function clear() {
    [ erremail].forEach(function (e) {
      e.innerHTML = "";
      e.style.color = "red";
    });
  }


 if (action.trim().toLowerCase() == "emaliempty") {
    clear();
    erremail.innerHTML = "email is empty!";
  }
  
  else if ( action.trim().toLowerCase() == "emaildb" || action.trim().toLowerCase() == "emailbad") {
    clear();
    erremail.innerHTML = "Invalid email address! <a href='sing-Up.html'>sing-Up</a>";
  }
  
  else if (action.trim().toLowerCase() == "notverified") {
    clear();
    verified.innerHTML = "error 404!";
    verified.style.color="red";
    verified.style.textShadow="1px 1px 12px #e7422c";
    setTimeout(function () {
      window.location.replace("error404.php");
  }, 10);
    
  }
  
  else if (action.trim().toLowerCase() == "verified") {
    clear();

    let iconVerified = document.createElement("img");
    iconVerified.setAttribute("src", "imgs/check.gif");
    iconVerified.id="iconVerified";
    verified.appendChild(iconVerified);

    setTimeout(function () {
      window.location.replace("code.html");
  }, 990);

  }
}; //onload
}); //click


