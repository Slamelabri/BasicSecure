document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const errorContainer = document.getElementById('errorContainer');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        errorContainer.innerHTML = '';

        // Collect form data
        const formData = new FormData(loginForm);

        // Send form data to server using fetch API
        fetch('../controller/process-sign_in.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // If login successful, redirect
                    window.location.href = data.redirect;
                } else {
                    // If login failed, display errors
                    Object.values(data.errors).forEach(error => {
                        const errorElement = document.createElement('div');
                        errorElement.textContent = error;
                        errorElement.classList.add('alert', 'alert-danger'); // Add Bootstrap alert class
                        errorContainer.appendChild(errorElement);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
