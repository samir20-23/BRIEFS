let submit = document.getElementById("submit");
let inputs = document.querySelectorAll("input");

let loader =document.querySelector(".loader");

//element
let email = document.getElementById("email");
//err element 
let erremail = document.getElementById("erremail");
let verified= document.getElementById("verified");

 //clear 
 function clear() {
    [ erremail].forEach(function (e) {
      e.innerHTML = "";
      e.style.color = "red";
    });
  }

submit.addEventListener("click",function(){
 
let request = new XMLHttpRequest();
request.open("POST","forgot.php");
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "email="+email.value
)


request.responseType = "document";
request.onload = () => {
  action = request.response.body.innerHTML;
 console.log(action);
 

 if (action.trim().toLowerCase() == "emaliempty") {
  loader.style.display="none";
    clear();
    erremail.innerHTML = "email is empty!";
  }
  
  else if ( action.trim().toLowerCase() == "emaildb" || action.trim().toLowerCase() == "emailbad") {
  loader.style.display="none";

    clear();
    erremail.innerHTML = "Invalid email address! <a href='sing-Up.html'>sing-Up</a>";
  }
  
  else if (action.trim().toLowerCase() == "notverified") {
  loader.style.display="none";

    clear();
    verified.innerHTML = "error 404!";
    verified.style.color="red";
    verified.style.textShadow="1px 1px 12px #e7422c";
    setTimeout(function () {
      window.location.replace("error404.php");
  }, 10);
    
  }
 
  else if (action.trim().toLowerCase() == "verified" || action == "verified") {
    location.href = "code.html";
   loader.style.display="block";
    clear();
    let iconVerified = document.createElement("img");
    iconVerified.setAttribute("src", "imgs/check.gif");
    iconVerified.id="iconVerified";
    verified.appendChild(iconVerified);


 


  }
}; //onload
loader.style.display="block";
}); //click
inputs.forEach(inputs => {
  inputs.addEventListener("click", function() {
clear();
});
})
