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
    // Selecting form elements
    const userForm = document.getElementById('st-admission-form');
    const rollNumberInput = document.getElementById('rollNumber');
    const regNumberInput = document.getElementById('reg_number');
    const stdNameInput = document.getElementById('std_name');
    const stdDboInput = document.getElementById('std_dbo');
    const stdGenderSelect = document.getElementById('std_gender');
    const stdAccommodationSelect = document.getElementById('std_accommodation');
    const stdBirthPlaceInput = document.getElementById('std_birth_place');
    const stdAddressInput = document.getElementById('std_address');
    const guarNameInput = document.getElementById('guar_name');
    const guarRelationInput = document.getElementById('guar_relation');
    const guarNumberInput = document.getElementById('guar_number');
    const guarCnicInput = document.getElementById('guar_cnic');
    const guarAddressInput = document.getElementById('guar_address');
    const guarEmailInput = document.getElementById('guar_email');
    const preSchoolInput = document.getElementById('pre_school');
    const preClassInput = document.getElementById('pre-class');
    const nextClassInput = document.getElementById('next-class');
    const admDateInput = document.getElementById('adm_date');
    const studentMadarasaSelect = document.getElementById('studentMadarasa');
    const madYearSelect = document.getElementById('MadYear');
    const departmentSelect = document.getElementById('department');
    const studentClassSelect = document.getElementById('studentclass');
    const sectionSelect = document.getElementById('section');
    const stdQadeemSelect = document.getElementById('std_qadeem');
    const admiFeesInput = document.getElementById('admi_fees');
    const monthlyFeesInput = document.getElementById('monthly_fees');

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
        if (!regNumberInput.value.trim()) {
            document.getElementById('reg_number_err').textContent = 'Please enter registration number.';
            regNumberInput.classList.add('is-invalid');
            isValid = false;
        }

        if (!stdNameInput.value.trim()) {
            document.getElementById('std_name_err').textContent = 'Please enter student name.';
            stdNameInput.classList.add('is-invalid');
            isValid = false;
        }

        // Similarly, validate other fields...

        if (isValid) {
            userForm.submit(); // Submit the form if all inputs are valid
        }
    }

    // Event listener to validate form on submit
    userForm.addEventListener('submit', validateForm);
});
