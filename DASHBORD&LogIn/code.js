let inputs = document.querySelectorAll("input");

   //err
   let errcode = document.getElementById("errcode");
    let verified = document.getElementById("verified");
    //elements
    let code = document.getElementById("code") ;
    let loader =document.querySelector(".loader");
    //clear
 function clear() {
         [ errcode].forEach(function (e) {
           e.innerHTML = "";
           e.style.color = "red";
         })}
         

    document.getElementById("submit").addEventListener("click",function(){
    

    request = new XMLHttpRequest();
    request.open("POST","code.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send(
        "code="+code.value
    )
     request.responseType = "document";
     request.onload = () => {
       action = request.response.body.innerHTML;
      console.log(action);
      

 if (action.trim().toLowerCase() == "codeempty") {
  loader.style.display="none";
    clear();
    errcode.innerHTML = "code is empty!";
  }
  
  else if ( action.trim().toLowerCase() == "notexact") {
    loader.style.display="none";
    clear();
    errcode.innerHTML = " code not exact!";
  }
  else if ( action.trim().toLowerCase() == "notsend") {
    loader.style.display="none";
    clear();
    errcode.innerHTML = " code not exact!<a href='forgot.html'>send agane!</a>";
  }
  else if (action.trim().toLowerCase() == "notverified") {
    loader.style.display="none";
    clear();
    verified.innerHTML = "error 404!";
    verified.style.color="red";
    verified.style.textShadow="1px 1px 12px #e7422c";
    setTimeout(function () {
      window.location.replace("error404.php");
  }, 555);
    
  }
  
  else if (action.trim().toLowerCase() == "verified") {
    loader.style.display="block";
    clear();

    let iconVerified = document.createElement("img");
    iconVerified.setAttribute("src", "imgs/check.gif");
    iconVerified.id="iconVerified";
    verified.appendChild(iconVerified);

    setTimeout(function () {
      window.location.replace("edit-password.html");
  }, 555);

  }
}; //onload
loader.style.display="block";}); //click



inputs.forEach(inputs => {
  inputs.addEventListener("input", function() {
clear();
});
})
