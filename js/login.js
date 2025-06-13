const form = document.querySelector("form");
const inputBoxes = document.querySelectorAll(".input-box input");
const errorTxt = document.querySelectorAll(".input-box p");
const submitBtn = document.querySelector("input[type='submit']");
const passwordShowIcon = document.querySelector(".input-box .bi-eye-slash-fill");
const passwordInput = document.querySelector(".input-box input[type='password']");

document.getElementById('login-form').addEventListener('submit', function(event, error) {
  // Perform form validation
  // ...

  // If there is an error, add the 'shake' class to the form element
  if (error) {
      event.preventDefault();
      document.getElementById('signup-form').classList.add('shake');

      // Remove the 'shake' class after a certain duration
      setTimeout(function() {
          document.getElementById('signup-form').classList.remove('shake');
      }, 800); // Adjust the duration as needed
  }
});

passwordShowIcon.onclick = () => {
  passwordInput.type = passwordInput.type === "password" ? "text" : "password";
  passwordShowIcon.className = `bi bi-eye${passwordInput.type === "password" ? "-slash" : ""}-fill`;
};
form.onsubmit = (e) => {
  e.preventDefault();
  if (inputBoxes[0].value === "") {
    errorTxt[0].style.display = "flex";
    errorTxt[0].innerHTML = '<i class="bi bi-info-circle-fill"></i> Email is missing.';
  } else {
    errorTxt[0].style.display = "none";
  }

  if (inputBoxes[1].value === "") {
    errorTxt[1].style.display = "flex";
    errorTxt[1].innerHTML = '<i class="bi bi-info-circle-fill"></i> Password is missing.';
  } else {
    errorTxt[1].style.display = "none";
  }

  inputBoxes[0].onkeyup = () => {
    const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!inputBoxes[0].value.match(pattern)) {
      errorTxt[0].style.display = "flex";
      document.getElementById('signup-form').classList.add('shake');
      errorTxt[0].innerHTML = '<i class="bi bi-info-circle-fill"></i> Email is invalid.';
    }
  };
}

submitBtn.onclick = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/login", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        // console.log(data);
        if (data === "success") {
          location.href = "./";
        }
        if (data === "Email is not found") {
          errorTxt[0].style.display = "flex";
          errorTxt[0].innerHTML = '<i class="bi bi-info-circle-fill"></i> Email is not found.';
        }
        if (data === "Wrong password") {
          errorTxt[1].style.display = "flex";
          errorTxt[1].innerHTML = '<i class="bi bi-info-circle-fill"></i> Wrong password.';
        }
      }
    }
  }
  const formData = new FormData(form);
  xhr.send(formData);
}