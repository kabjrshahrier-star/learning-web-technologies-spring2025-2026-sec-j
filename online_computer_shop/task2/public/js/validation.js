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

// Task 2: Admin validation
function validateCategoryForm() {
    const name = document.getElementById('category_name');
    if (!name) return true;

    if (name.value.trim() === '') {
        alert('Category name is required.');
        name.focus();
        return false;
    }

    return true;
}

function validateBrandForm() {
    const name = document.getElementById('brand_name');
    const category = document.getElementById('brand_category_id');

    if (name && name.value.trim() === '') {
        alert('Brand name is required.');
        name.focus();
        return false;
    }

    if (category && category.value === '') {
        alert('Please select a category.');
        category.focus();
        return false;
    }

    return true;
}

function validateProductForm() {
    const name = document.getElementById('product_name');
    const price = document.getElementById('product_price');
    const category = document.getElementById('product_category_id');
    const brand = document.getElementById('product_brand_id');
    const stock = document.getElementById('product_stock');
    const description = document.getElementById('product_description');
    const review = document.getElementById('product_manufacturer_review');
    const image = document.getElementById('product_image');

    if (name && name.value.trim() === '') {
        alert('Product name is required.');
        name.focus();
        return false;
    }

    if (price && (price.value === '' || Number(price.value) <= 0)) {
        alert('Price must be greater than 0.');
        price.focus();
        return false;
    }

    if (category && category.value === '') {
        alert('Please select a category.');
        category.focus();
        return false;
    }

    if (brand && brand.value === '') {
        alert('Please select a brand.');
        brand.focus();
        return false;
    }

    if (stock && (stock.value === '' || Number(stock.value) < 0 || !Number.isInteger(Number(stock.value)))) {
        alert('Stock must be a non-negative integer.');
        stock.focus();
        return false;
    }

    if (description && description.value.trim() === '') {
        alert('Description is required.');
        description.focus();
        return false;
    }

    if (review && review.value.trim() === '') {
        alert('Manufacturer review is required.');
        review.focus();
        return false;
    }

    if (image && image.files.length > 0) {
        const file = image.files[0];
        const allowed = ['image/jpeg', 'image/png'];
        const maxSize = 2 * 1024 * 1024;

        if (!allowed.includes(file.type)) {
            alert('Only JPEG and PNG images are allowed.');
            image.focus();
            return false;
        }

        if (file.size > maxSize) {
            alert('Product image must be 2MB or smaller.');
            image.focus();
            return false;
        }
    }

    return true;
}

// Task 2: AJAX brand loading for product form
const productCategorySelect = document.getElementById('product_category_id');
const productBrandSelect = document.getElementById('product_brand_id');

if (productCategorySelect && productBrandSelect) {
    productCategorySelect.addEventListener('change', function () {
        const categoryId = this.value;
        productBrandSelect.innerHTML = '<option value="">Loading brands...</option>';

        if (!categoryId) {
            productBrandSelect.innerHTML = '<option value="">Select Brand</option>';
            return;
        }

        fetch('api/admin/brands-by-category.php?category_id=' + encodeURIComponent(categoryId))
            .then(response => response.json())
            .then(data => {
                productBrandSelect.innerHTML = '<option value="">Select Brand</option>';

                if (!data.success || data.brands.length === 0) {
                    productBrandSelect.innerHTML += '<option value="">No brand found</option>';
                    return;
                }

                data.brands.forEach(brand => {
                    const option = document.createElement('option');
                    option.value = brand.id;
                    option.textContent = brand.name;
                    productBrandSelect.appendChild(option);
                });
            })
            .catch(() => {
                productBrandSelect.innerHTML = '<option value="">Could not load brands</option>';
            });
    });
}
