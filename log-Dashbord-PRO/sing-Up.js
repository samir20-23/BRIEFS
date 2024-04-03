let submit = document.getElementById("submit");
let errusername = document.getElementById("errusername");
let erremail = document.getElementById("erremail");
let errpassword = document.getElementById("errpassword");
let errcpassword = document.getElementById("errcpassword");
let verified = document.getElementById("verified");
submit.addEventListener("click", function () {
  //Element
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let cpassword = document.getElementById("cpassword").value;
  //errors elements

  let request = new XMLHttpRequest();
  request.open("POST", "sing-Up.php");
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(
    "username=" +
      username +
      "&email=" +
      email +
      "&password=" +
      password +
      "&cpassword=" +
      cpassword
  );
  request.responseType = "document";
  request.onload = () => {
    response = request.response.body.innerHTML;
    console.log(response);

    function clear() {
      [errusername, erremail, errpassword, errcpassword].forEach(function (e) {
        e.innerHTML = "";
        e.style.color = "red";
      });
    }

    if (response == "userempty") {
      clear();
      errusername.innerHTML = "username is empty!";
    } else if (response == "emailempty") {
      clear();
      erremail.innerHTML = "email is empty!";
    } else if (response == "emailempty" || response == "emaildb") {
      clear();
      erremail.innerHTML = "Invalid email address!";
    } else if (response == "passwordempty") {
      clear();
      errpassword.innerHTML = "password is empty!";
    } else if (response == "paasswordlenght") {
      clear();
      errpassword.innerHTML = "to short !";
    } else if (response == "notmatch") {
      clear();
      errcpassword.innerHTML = "passwords not match!";
    } else if (response == "notverified") {
      clear();
      verified.innerHTML = "error 404!";
      setTimeout(function () {
        window.location.replace("error404.php");
    }, 90000);
      
    } else if (response == "verified") {
      clear();
      verified.innerHTML = "Account created successfully!";
      verified.style.color = "green";
      setTimeout(function () {
        window.location.replace("log-in.html");
    }, 990);
 
    }
  }; //onload
}); //click
