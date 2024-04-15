let submit = document.getElementById("submit");
let inputs = document.querySelectorAll("input");

 //errors elements
let errusername = document.getElementById("errusername");
let erremail = document.getElementById("erremail");
let errpassword = document.getElementById("errpassword");
let errcpassword = document.getElementById("errcpassword");
let verified = document.getElementById("verified");
//reload
let loader =document.querySelector(".loader");

 //Element
  let username = document.getElementById("username");
  let email = document.getElementById("email");
  let password = document.getElementById("password");
  let cpassword = document.getElementById("cpassword");
  
  
  //clear()
  function clear() {
      [errusername, erremail, errpassword, errcpassword].forEach(function (e) {
        e.innerHTML = "";
        e.style.color = "red";
      });
    }
submit.addEventListener("click", function () {
 
 

  let request = new XMLHttpRequest();
  request.open("POST", "sing-Up.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "username=" +
      username.value +
      "&email=" +
      email.value +
      "&password=" +
      password.value +
      "&cpassword=" +
      cpassword.value
  );
  request.responseType = "document";
  request.onload = () => {
    response = request.response.body.innerHTML;
   

    console.log(response);  

    if (response.trim().toLowerCase() == "userempty") {
      loader.style.display="none";
      clear();
      errusername.innerHTML = "username is empty!";
    } else if (response.trim().toLowerCase() == "emailempty") {
      loader.style.display="none";
      clear();
      erremail.innerHTML = "email is empty!";
    } else if (response.trim().toLowerCase() == "emailbad" ) {
      loader.style.display="none";
      clear();
      erremail.innerHTML = "Invalid email address!";
    }else if ( response.trim().toLowerCase() == "emaildb") {
      loader.style.display="none";
      clear();
      erremail.innerHTML = "email  Already exists <a href='log-in.html'>log-In</a> !";
    } else if (response.trim().toLowerCase() == "passwordempty") {
      loader.style.display="none";
      clear();
      errpassword.innerHTML = "password is empty!";
    } else if (response.trim().toLowerCase() == "paasswordlenght") {
      loader.style.display="none";
      clear();
      errpassword.innerHTML = "to short !";
    } else if (response.trim().toLowerCase() == "notmatch") {
      loader.style.display="none";
      clear();
      errcpassword.innerHTML = "passwords not match!";
    } else if (response.trim().toLowerCase() == "notverified") {
      loader.style.display="none";
      clear();
      verified.innerHTML = "error 404!";
      verified.style.color="red";
      verified.style.textShadow="1px 1px 12px #e7422c";
      setTimeout(function () {
        window.location.replace("error404.php");
    }, 999);
      
    } else if (response.trim().toLowerCase() == "verified") {
      loader.style.display="block";
      clear();
      let iconVerified = document.createElement("img");
      iconVerified.setAttribute("src", "imgs/check.gif");
      iconVerified.id="iconVerified";
      verified.appendChild(iconVerified);
      setTimeout(function () {
        window.location.replace("log-in.html");
    }, 999);
 
    }
  }; //onload
loader.style.display="block";

}); //click


inputs.forEach(inputs => {
    inputs.addEventListener("input", function() {
clear();
  });
})
  

