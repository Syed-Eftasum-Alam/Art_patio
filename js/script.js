const form = document.getElementById('login-form');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const username = usernameInput.value;
  const password = passwordInput.value;

  // Validate username and password here
  // ...

  // If valid, redirect to dashboard
  window.location.href = 'dashboard.html';
});
