// ====================== number only admission fees ======================
document.addEventListener('DOMContentLoaded', function () {
    const userPhoneInput = document.getElementById('user_phone');
    const userPhoneError = document.getElementById('user_phone_err');

    userPhoneInput.addEventListener('input', function () {
        const inputValue = userPhoneInput.value.trim();
        const numericValue = inputValue.replace(/\D/g, ''); // Remove non-numeric characters

        if (inputValue !== numericValue) { // If non-numeric characters are present
            userPhoneError.textContent = '';
            userPhoneError.style.display = 'block';
            userPhoneInput.classList.add('is-invalid');
        } else {
            userPhoneError.textContent = ''; // Clear error message
            userPhoneError.style.display = 'none';
            userPhoneInput.classList.remove('is-invalid');
        }

        // Update the input value with the cleaned numeric value
        userPhoneInput.value = numericValue;
    });
});

// ======================== username lowercase only  ======================
document.addEventListener('DOMContentLoaded', function () {
    const usernameInput = document.getElementById('username');
    const usernameError = document.getElementById('username_err');

    usernameInput.addEventListener('input', function () {
        let inputValue = usernameInput.value.trim();

        // Convert input value to lowercase
        inputValue = inputValue.toLowerCase();
        usernameInput.value = inputValue;

        // Check if input value is empty
        if (inputValue === '') {
            usernameError.textContent = 'براہ کرم یوزَر نام درج کریں۔';
            usernameError.style.display = 'block';
            usernameInput.classList.add('is-invalid');
        }
        // Check if input value contains characters other than lowercase letters, '.', '-', '_'
        else if (!/^[a-z._-]+$/.test(inputValue)) {
            usernameError.textContent = 'Username should contain only lowercase letters, ".", "-", or "_".';
            usernameError.style.display = 'block';
            usernameInput.classList.add('is-invalid');
        } else {
            usernameError.textContent = '';
            usernameError.style.display = 'none';
            usernameInput.classList.remove('is-invalid');
        }
    });
});




// ========================================================================

document.addEventListener('DOMContentLoaded', function () {
    const madarsaAccessForm = document.getElementById('masarsa_access_form');
    const madarsaName = document.getElementById('madarsa_name');
    const userNameInput = document.getElementById('user_name');
    const userPhoneInput = document.getElementById('user_phone');
    const usernameInput = document.getElementById('username');
    const userEmailInput = document.getElementById('user_email');
    const userPasswordInput = document.getElementById('user_password');

    // Function to validate password
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('user_password');
        const eyeIcon = document.getElementById('eye_icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('ti-eye-off');
            eyeIcon.classList.add('ti-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('ti-eye');
            eyeIcon.classList.add('ti-eye-off');
        }
    }

    // Function to validate form
    function validateForm(event) {
        event.preventDefault(); // Prevent form submission

        let isValid = true;

        // Reset error messages and borders
        const errorSpans = document.querySelectorAll('.error');
        errorSpans.forEach(span => {
            span.textContent = '';
        });
        const inputFields = document.querySelectorAll('.form-control');
        inputFields.forEach(field => {
            field.classList.remove('is-invalid');
        });

        // Validate each input field
        if (!madarsaName.value.trim()) {
            document.getElementById('madarsa_name_err').textContent = 'براہ کرم مدرسہ منتخب کریں';
            madarsaName.classList.add('is-invalid');
            isValid = false;
        }

        if (!userNameInput.value.trim()) {
            document.getElementById('user_name_err').textContent =  'براہ کرم نام منتخب کریں۔';
            userNameInput.classList.add('is-invalid');
            isValid = false;
        }

        if (!userPhoneInput.value.trim()) {
            document.getElementById('user_phone_err').textContent = 'براہ کرم فون نمبر منتخب کریں۔';
            userPhoneInput.classList.add('is-invalid');
            isValid = false;
        }

        if (!usernameInput.value.trim()) {
            document.getElementById('username_err').textContent = 'براہ کرم یوزَر نام منتخب کریں۔';
            usernameInput.classList.add('is-invalid');
            isValid = false;
        }

        if (!userEmailInput.value.trim()) {
            document.getElementById('user_email_err').textContent = 'براہ کرم ای میل منتخب کریں۔';
            userEmailInput.classList.add('is-invalid');
            isValid = false;
        }

        if (!userPasswordInput.value.trim()) {
            document.getElementById('user_password_err').textContent = 'براہ کرم پاس ورڈ منتخب کریں۔';
            userPasswordInput.classList.add('is-invalid');
            isValid = false;
        }

        if (isValid) {
            madarsaAccessForm.submit(); // Submit the form if all inputs are valid
        }
    }

    // Event listeners
    madarsaAccessForm.addEventListener('submit', validateForm);
    document.getElementById('toggle_password').addEventListener('click', togglePasswordVisibility);

    // Event listeners to remove error messages when typing in input fields
    madarsaName.addEventListener('input', function () {
        document.getElementById('madarsa_name_err').textContent = '';
        madarsaName.classList.remove('is-invalid');
    });

    userNameInput.addEventListener('input', function () {
        document.getElementById('user_name_err').textContent = '';
        userNameInput.classList.remove('is-invalid');
    });

    userPhoneInput.addEventListener('input', function () {
        document.getElementById('user_phone_err').textContent = '';
        userPhoneInput.classList.remove('is-invalid');
    });

    usernameInput.addEventListener('input', function () {
        document.getElementById('username_err').textContent = '';
        usernameInput.classList.remove('is-invalid');
    });

    userEmailInput.addEventListener('input', function () {
        document.getElementById('user_email_err').textContent = '';
        userEmailInput.classList.remove('is-invalid');
    });

    userPasswordInput.addEventListener('input', function () {
        document.getElementById('user_password_err').textContent = '';
        userPasswordInput.classList.remove('is-invalid');
    });
});
