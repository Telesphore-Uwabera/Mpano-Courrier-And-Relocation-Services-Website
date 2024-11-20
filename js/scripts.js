// Select the toggle button and the navbar links
const toggleButton = document.querySelector('.navbar-toggle');
const navbarLinks = document.querySelector('.navbar-links ul');

// Add a click event listener to toggle the 'active' class
toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active');
});
