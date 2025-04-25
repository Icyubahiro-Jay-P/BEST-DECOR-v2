const deleteAccount = document.querySelector("#deleteAccount");

deleteAccount.addEventListener('click', () => {
  const isConfirmed = confirm('Are you sure you want to delete account? This action is irreversible and all your data will be lost');
  if (isConfirmed) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/delete_account.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const data = xhr.response;
          console.log(data);
          if (data == "Account deleted successfully") {
            alert(data);
            window.location.assign("../pages/login.php");
          }
        }
      }
    }
    xhr.send();
  }
});