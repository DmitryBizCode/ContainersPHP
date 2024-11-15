function previewPhoto() {
    const file = document.getElementById('photo').files[0];
    const preview = document.getElementById('photoImage');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function validateForm() {
    let isValid = true;

    // Get form values
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();

    // Get error elements
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    // Reset error messages
    nameError.classList.remove('active');
    emailError.classList.remove('active');
    passwordError.classList.remove('active');

    // Validate Name
    if (name === '') {
        nameError.classList.add('active');
        isValid = false;
    }

    // Validate Email
    if (email === '') {
        emailError.classList.add('active');
        isValid = false;
    }

    // Validate Passwords (if new password is provided)
    if (password !== '' && password !== confirmPassword) {
        passwordError.classList.add('active');
        isValid = false;
    }

    return isValid;
}