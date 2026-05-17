function showAlert(message) {
    alert(message);
}

function validateRegisterForm() {
    const name = document.getElementById('reg_name').value.trim();
    const email = document.getElementById('reg_email').value.trim();
    const password = document.getElementById('reg_password').value;
    const confirmPassword = document.getElementById('reg_confirm_password').value;
    const role = document.getElementById('reg_role').value;

    if (name === '') {
        showAlert('Name is required.');
        return false;
    }

    if (!isValidEmail(email)) {
        showAlert('Enter a valid email address.');
        return false;
    }

    if (password.length < 8) {
        showAlert('Password must be at least 8 characters.');
        return false;
    }

    if (password !== confirmPassword) {
        showAlert('Password and confirm password do not match.');
        return false;
    }

    if (role !== 'admin' && role !== 'customer') {
        showAlert('Please select a valid role.');
        return false;
    }

    return true;
}

function validateLoginForm() {
    const email = document.getElementById('login_email').value.trim();
    const password = document.getElementById('login_password').value;

    if (!isValidEmail(email)) {
        showAlert('Enter a valid email address.');
        return false;
    }

    if (password === '') {
        showAlert('Password is required.');
        return false;
    }

    return true;
}

function validateProfileForm() {
    const name = document.getElementById('profile_name').value.trim();
    const email = document.getElementById('profile_email').value.trim();
    const fileInput = document.getElementById('profile_picture');
    const currentPassword = document.getElementById('current_password').value;
    const newPassword = document.getElementById('new_password').value;
    const confirmNewPassword = document.getElementById('confirm_new_password').value;

    if (name === '') {
        showAlert('Name is required.');
        return false;
    }

    if (!isValidEmail(email)) {
        showAlert('Enter a valid email address.');
        return false;
    }

    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const allowedTypes = ['image/jpeg', 'image/png'];

        if (!allowedTypes.includes(file.type)) {
            showAlert('Only JPEG and PNG profile pictures are allowed.');
            return false;
        }

        if (file.size > 2 * 1024 * 1024) {
            showAlert('Profile picture must be 2MB or smaller.');
            return false;
        }
    }

    const wantsPasswordChange = currentPassword !== '' || newPassword !== '' || confirmNewPassword !== '';

    if (wantsPasswordChange) {
        if (currentPassword === '') {
            showAlert('Current password is required.');
            return false;
        }

        if (newPassword.length < 8) {
            showAlert('New password must be at least 8 characters.');
            return false;
        }

        if (newPassword !== confirmNewPassword) {
            showAlert('New password and confirm password do not match.');
            return false;
        }
    }

    return true;
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// AJAX email availability check.
// This satisfies the Task 1 Ajax/JSON requirement.
document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('reg_email');
    const message = document.getElementById('emailCheckMsg');

    if (!emailInput || !message) {
        return;
    }

    emailInput.addEventListener('blur', function () {
        const email = emailInput.value.trim();

        if (!isValidEmail(email)) {
            return;
        }

        fetch('api/auth/check-email.php?email=' + encodeURIComponent(email))
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    message.textContent = 'This email is already registered.';
                } else {
                    message.textContent = 'Email is available.';
                    message.style.color = '#166534';
                }
            })
            .catch(() => {
                message.textContent = 'Could not check email right now.';
            });
    });
});
