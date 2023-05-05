// script.js
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const logoutButton = document.getElementById('logout-button');

loginForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const formData = new FormData(loginForm);
  fetch(loginForm.action, {
    method: loginForm.method,
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.success) {
        window.location.href = 'dashboard.html';
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error(error));
});

registerForm.addEventListener('submit', (event) => {
  event.preventDefault();
  const formData = new FormData(registerForm);
  fetch(registerForm.action, {
    method: registerForm.method,
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      if (data.success) {
        alert('Registration successful. Please login to continue.');
      } else {
        alert(data.message);
      }
    })
    .catch(error => console.error(error));
});

if (logoutButton) {
  logoutButton.addEventListener('click', () => {
    fetch('logout.php')
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success) {
          window.location.href = 'index.html';
        } else {
          alert(data.message);
        }
      })
      .catch(error => console.error(error));
  });
}
