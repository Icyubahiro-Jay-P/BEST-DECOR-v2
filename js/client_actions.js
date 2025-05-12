function submitClientForm(formElement, successRedirect) {
  formElement.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(formElement);
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", formElement.action, true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          if (xhr.response === "success") {
            window.location.assign(successRedirect);
          }
        }
      }
    }
    xhr.send(formData);
  });
}

// For delete client actions
function deleteClient(clientId) {
  if(confirm('Are you sure you want to delete this client?')) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `../php/delete_client.php?id=${clientId}`, true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          if (xhr.response === "success") {
            window.location.reload();
          }
        }
      }
    }
    xhr.send();
  }
}
