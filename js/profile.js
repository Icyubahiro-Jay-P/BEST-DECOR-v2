const imgContainer = document.querySelector(".image-container");
const profilePicture = imgContainer.querySelector("img");
const closeIcon = imgContainer.querySelector("i");
const profileDetails = document.querySelector(".profile-details");
const tools = document.querySelector(".tools");
const body = document.querySelector('body');
const overlay = document.createElement('div');
const changePhoto = document.querySelector("#changePhoto");
const profileInputFile = document.querySelector("#profileInputFile");
overlay.className = 'overlay';
document.body.appendChild(overlay);

profilePicture.addEventListener('click', () => {
  profilePicture.classList.add('enlarged');
  closeIcon.style.display = "block";
  overlay.style.display = "block";
  document.body.style.overflow = 'hidden';
});

function closeEnlargedView() {
  profilePicture.classList.remove('enlarged');
  closeIcon.style.display = "none";
  overlay.style.display = "none";
  document.body.style.overflow = 'auto';
}

closeIcon.addEventListener('click', closeEnlargedView);
overlay.addEventListener('click', closeEnlargedView);

// Close on escape key
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    closeEnlargedView();
  }
});

// Handle touch events for mobile
let touchStartY;
profilePicture.addEventListener('touchstart', (e) => {
  touchStartY = e.touches[0].clientY;
});

profilePicture.addEventListener('touchmove', (e) => {
  if (profilePicture.classList.contains('enlarged')) {
    const touchEndY = e.touches[0].clientY;
    const diff = touchStartY - touchEndY;
    if (Math.abs(diff) > 50) { // Swipe threshold
      closeEnlargedView();
    }
  }
});

// Prevent image dragging
profilePicture.addEventListener('dragstart', (e) => e.preventDefault());

changePhoto.addEventListener("click", () => {
  profileInputFile.click();
  const xhr = new XMLHttpRequest();
  xhr.open('POST', "./php/change_profile_picture.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const data = xhr.response;
        console.log(data);
      }
    }
  }
  const formData = new FormData();
  xhr.send(formData);
})

