   let errcode = document.getElementById("errcode");
    let verified = document.getElementById("verified");
    
    document.getElementById("submit").addEventListener("click",function(){
    let code = document.getElementById("code").value ;

    request = new XMLHttpRequest();
    request.open("POST","code.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.send(
        "code="+code
    )
     request.responseType = "document";
     request.onload = () => {
       action = request.response.body.innerHTML;
      console.log(action);
       function clear() {
         [ errcode].forEach(function (e) {
           e.innerHTML = "";
           e.style.color = "red";
         })}
         

 if (action.trim().toLowerCase() == "codeempty") {
    clear();
    errcode.innerHTML = "code is empty!";
  }
  
  else if ( action.trim().toLowerCase() == "notexact") {
    clear();
    errcode.innerHTML = " code not exact!";
  }
  else if ( action.trim().toLowerCase() == "notsend") {
    clear();
    errcode.innerHTML = " code not exact!<a href='forgot.html'>send agane!</a>";
  }
  else if (action.trim().toLowerCase() == "notverified") {
    clear();
    verified.innerHTML = "error 404!";
    verified.style.color="red";
    verified.style.textShadow="1px 1px 12px #e7422c";
    setTimeout(function () {
      window.location.replace("error404.php");
  }, 555);
    
  }
  
  else if (action.trim().toLowerCase() == "verified") {
    clear();

    let iconVerified = document.createElement("img");
    iconVerified.setAttribute("src", "imgs/check.gif");
    iconVerified.id="iconVerified";
    verified.appendChild(iconVerified);

    setTimeout(function () {
      window.location.replace("edit-password.html");
  }, 990);

  }
}; //onload
}); //click


