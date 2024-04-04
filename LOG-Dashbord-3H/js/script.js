function eye1() {
    let passwordInput = document.getElementById("password");
    let eyeSlash = document.getElementById("eyeIcon1");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeSlash.classList.remove("fa-eye-slash");
      eyeSlash.classList.add("fa-eye");
    } else {
      passwordInput.type = "password";
      eyeSlash.classList.remove("fa-eye");
      eyeSlash.classList.add("fa-eye-slash");
    }
  }
  
  function eye2() {
    let cpasswordInput = document.getElementById("cpassword");
    let eyeSlash = document.getElementById("eyeIcon2");
    if (cpasswordInput.type === "password") {
      cpasswordInput.type = "text";
      eyeSlash.classList.remove("fa-eye-slash");
      eyeSlash.classList.add("fa-eye");
    } else {
      cpasswordInput.type = "password";
      eyeSlash.classList.remove("fa-eye");
      eyeSlash.classList.add("fa-eye-slash");
    }
  }
  
  //

