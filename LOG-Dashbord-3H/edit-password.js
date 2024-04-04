let submit = document.getElementById("submit");
let errpassword = document.getElementById("errpassword");
let errcpassword = document.getElementById("errcpassword");
let verified = document.getElementById("verified");

submit.addEventListener("click", function () {
  //Element
  let password = document.getElementById("password").value;
  let cpassword = document.getElementById("cpassword").value;
  //errors elements

  let request = new XMLHttpRequest();
  request.open("POST", "edit-password.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
      "password=" +
      password +
      "&cpassword=" +
      cpassword
  );
  request.responseType = "document";
  request.onload = () => {
    response = request.response.body.innerHTML;
   console.log(response);

    function clear() {
      [ errpassword, errcpassword , verified].forEach(function (e) {
        e.innerHTML = "";
        e.style.color = "red";
      });
    }
    
    if (response.trim().toLowerCase() == "passwordempty") {
        clear();
        errpassword.innerHTML = "password is empty!";
      }
      else if (response.trim().toLowerCase() == "paasswordlenght") {
        clear();
        errpassword.innerHTML = "to short !";
      } 
      
      else if (response.trim().toLowerCase() == "notmatch") {
        clear();
        errcpassword.innerHTML = "passwords not match!";
      }
      
      else if ( response.trim().toLowerCase() == "passwordbad") {
        clear();
        verified.innerHTML = "Enter a stronger password!";
      }
      
      else if ( response.trim().toLowerCase() == "emaildb") {
      clear();
      verified.innerHTML = "Invalid password address!<a href='forgot.html'>forgot password !</a>";
    }
    
    else if (response.trim().toLowerCase() == "notverified") {
      clear();
      verified.innerHTML = "error 404!";
      verified.style.color="red";
      verified.style.textShadow="1px 1px 12px #e7422c";
      setTimeout(function () {
        window.location.replace("error404.php");
    }, 999);
      
    } 
    
    else if (response.trim().toLowerCase() == "verified") {
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
}); //click