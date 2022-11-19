function disableSubmit() {
    document.getElementById("submit").disabled = true;
  }
  let termscheck = document.getElementById("terms");
  function activateButton(termscheck) {
    if (termscheck.checked) {
      document.getElementById("submit").disabled = false;
    } else {
      document.getElementById("submit").disabled = true;
    }
  }
  
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#password_1");
  togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
  
    // toggle the icon
    this.classList.toggle("bi-eye");
  });
  
  // prevent form submit
  // const form = document.querySelector("form");
  // form.addEventListener("submit", function (e) {
  //   e.preventDefault();
  // });
  
  const togglePassword2 = document.querySelector("#togglePassword2");
  const password2 = document.querySelector("#password_2");
  togglePassword2.addEventListener("click", function () {
    // toggle the type attribute
    const type =password2.getAttribute("type") === "password" ? "text" : "password";
    password2.setAttribute("type", type);
  
    // toggle the icon
    this.classList.toggle("bi-eye");
  });