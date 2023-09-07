const form = document.querySelector('#login-form');
form.addEventListener('submit', (event) => {
  event.preventDefault();
  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  // validate email and password here
  // if valid, redirect to home page
  window.location.href = "listfilm.php";
});

const registerBtn = document.getElementById("register-btn");
registerBtn.addEventListener("click", function() {
  window.location.href = "register.php";
});


