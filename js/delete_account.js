const deleteAccount = document.querySelector("#deleteAccount");
const form = document.querySelector("#deleteProfile");

deleteAccount.addEventListener('click', () => {
  const isConfirmed = confirm('Are you sure you want to delete account? This action is irreversible and all your data will be lost');
  if (isConfirmed) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/delete_account", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const data = xhr.response;
          console.log(data);
          if (data === "success") {
            window.location.assign("profile");
          }
        }
      }
    }
    const formData = new FormData(form);
    xhr.send(formData);
  }
});