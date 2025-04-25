const form = document.querySelector("form");
const inputBoxes = document.querySelectorAll(".input-box input");
const errorTxt = document.querySelectorAll(".input-box p");
const submitBtn = document.querySelector("input[type='submit']");
const passwordShowIcon = document.querySelectorAll(".input-box .bi-eye-slash-fill");
const passwordInputs = document.querySelectorAll(".input-box input[type='password']");

document.getElementById('change-password-form').addEventListener('submit', function(event, error) {
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

passwordShowIcon[0].onclick = () => {
  passwordInputs[0].type = passwordInputs[0].type === "password" ? "text" : "password";
  passwordShowIcon[0].className = `bi bi-eye${passwordInputs[0].type === "password" ? "-slash" : ""}-fill`;
};

passwordShowIcon[1].onclick = () => {
  passwordInputs[1].type = passwordInputs[1].type === "password" ? "text" : "password";
  passwordShowIcon[1].className = `bi bi-eye${passwordInputs[1].type === "password" ? "-slash" : ""}-fill`;
};
passwordShowIcon[2].onclick = () => {
  passwordInputs[2].type = passwordInputs[2].type === "password" ? "text" : "password";
  passwordShowIcon[2].className = `bi bi-eye${passwordInputs[2].type === "password" ? "-slash" : ""}-fill`;
};

form.onsubmit = (e) => {
  e.preventDefault();

  if (inputBoxes[0].value === "") {
    errorTxt[0].style.display = "flex";
    errorTxt[0].innerHTML = '<i class="bi bi-info-circle-fill"></i> Old password is missing.';
  } else {
    errorTxt[0].style.display = "none";
  }

  if (inputBoxes[1].value === "") {
    errorTxt[1].style.display = "flex";
    errorTxt[1].innerHTML = '<i class="bi bi-info-circle-fill"></i> New password is missing.';
  } else {
    errorTxt[1].style.display = "none";
  }

  if (inputBoxes[2].value === "") {
    errorTxt[2].style.display = "flex";
    errorTxt[2].innerHTML = '<i class="bi bi-info-circle-fill"></i> Confirm new password is missing.';
  } else {
    errorTxt[2].style.display = "none";
  }

};
submitBtn.onclick = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../php/change_password", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        console.log(data);
        if (data === "Password changed successfully") {
          alert('Password changed successfully');
          location.href = "../profile";
        }

        if (data === "Old password incorrect") {
          errorTxt[0].style.display = "flex";
          errorTxt[0].innerHTML = '<i class="bi bi-info-circle-fill"></i> Old password incorrect.';
        }
      };
    }
  };

  const formData = new FormData(form);
  xhr.send(formData);
};