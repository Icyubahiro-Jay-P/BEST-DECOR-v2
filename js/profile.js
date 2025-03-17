const imgContainer = document.querySelector(".image-container");
const profilePicture = imgContainer.querySelector("img");
const closeIcon = imgContainer.querySelector("i");
const profileDetails = document.querySelector(".profile-details");
const tools = document.querySelector(".tools");
const body = document.querySelector('body');
const overlay = document.createElement('div');
overlay.className = 'overlay';
document.body.appendChild(overlay);

function setResponsiveSize() {
  const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
  const viewportHeight = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);

  if (viewportWidth < 768) { // Mobile devices
    return { width: '100%', height: 'auto', maxHeight: '80vh' };
  } else if (viewportWidth < 1024) { // Tablets
    return { width: '80%', height: 'auto', maxHeight: '70vh' };
  } else { // Desktops and larger screens
    return { width: '1100px', height: '450px' };
  }
}

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

document.addEventListener('DOMContentLoaded', function() {
  // Profile form submission
  const profileForm = document.getElementById('profileForm');
  profileForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(profileForm);
    
    fetch('../php/update_profile.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Profile updated successfully');
      } else {
        alert('Error updating profile');
      }
    });
  });

  // Password form submission
  const passwordForm = document.getElementById('passwordForm');
  passwordForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(passwordForm);
    
    fetch('../php/update_password.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Password updated successfully');
        passwordForm.reset();
      } else {
        alert(data.message || 'Error updating password');
      }
    });
  });

  // Profile image upload
  const changePhoto = document.getElementById('changePhoto');
  let fileInput = document.createElement('input');
  fileInput.type = 'file';
  fileInput.accept = 'image/*';
  
  changePhoto.addEventListener('click', () => fileInput.click());
  
  fileInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
      const formData = new FormData();
      formData.append('profile_image', this.files[0]);
      
      fetch('../php/upload_profile_image.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.querySelector('.profile-image img').src = data.image_url;
        } else {
          alert('Error uploading image');
        }
      });
    }
  });
});