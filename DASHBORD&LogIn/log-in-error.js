let submit = document.getElementById("submit");

let inputs = document.querySelectorAll("input");






//errors elements
let erremail = document.getElementById("erremail");
let errpassword = document.getElementById("errpassword");
let verified = document.getElementById("verified");
let loader =document.querySelector(".loader");

 //Element
  let email = document.getElementById("email");
  let password = document.getElementById("password");
  
 function clear() {
      [ erremail, errpassword].forEach(function (e) {
        e.innerHTML = "";
        e.style.color = "red";
      });
    }
//add sing up
    let x =0;
submit.addEventListener("click", function () {

  let request = new XMLHttpRequest();
  request.open("POST", "log-in.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    
      "email=" +
      email.value +
      "&password=" +
      password.value 
  );
  request.responseType = "document";
  request.onload = () => {
    response = request.response.body.innerHTML;
   
    
  console.log(response);
   if (response == "emaliempty") {
  loader.style.display="none";

      clear();
      erremail.innerHTML = "email is empty!";
    }
    else if ( response == "emaildb" ||response == "emailbad") {
     
  loader.style.display="none";
      clear();
      erremail.innerHTML = "Invalid email address!";

      //add sing up
      x++;
      if(x >= 2 ){
              let linksingup = document.getElementById("linksingup");
              linksingup.innerHTML='sing-Up';
              linksingup.setAttribute("href","sing-Up.html");

      }
    }
    

    else if (response == "passwordempty") {
  loader.style.display="none";

      clear();
      errpassword.innerHTML = "password is empty!";
    }
  
    else if (response == "pasworddb") {
  loader.style.display="none";
      clear();
      errpassword.innerHTML = "Invalid email address!";
          x++;
      if( x >= 2){
        let linkforgot = document.getElementById("linkforgot");
        linkforgot.innerHTML='Forgot password?';
        linkforgot.setAttribute("href","forgot.html");
      }

    }
    
    else if (response == "notverified") {
  loader.style.display="none";

      clear();
      verified.innerHTML = "error 404!";
      verified.style.color="red";
      verified.style.textShadow="1px 1px 12px #e7422c";
      setTimeout(function () {
        window.location.replace("error404.php");
    }, 10);
      
    }
    
    else if (response == "verified") {
      loader.style.display="block";
      clear();

      let iconVerified = document.createElement("img");
      iconVerified.setAttribute("src", "imgs/check.gif");
      iconVerified.id="iconVerified";
      verified.appendChild(iconVerified);

      
        window.location.replace("DASHBORD/DASHBORD.php");
   
 
    }
  }; //onload
  loader.style.display="block";}); //click

  //clear inputs
inputs.forEach(inputs => {
  inputs.addEventListener("input", function() {
clear();
});
})




/* <a href="#" id="linksignup"  onclick=' setTimeout(function () {window.location.replace("sing-Up.html");}, 555);'> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> </a>
            <a href="#" id="linkforgot" onclick=' setTimeout(function () {window.location.replace("forgot.html");}, 555);'>Forgot password?</a>
             */
