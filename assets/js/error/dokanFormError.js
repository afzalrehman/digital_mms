// ====================== number only admission fees ======================
document.addEventListener('DOMContentLoaded', function () {
    const userPhoneInput = document.getElementById('dokan_rent');
    const userPhoneError = document.getElementById('dokan_rent_err');

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







// ======================== Validation of fields  ======================
document.addEventListener('DOMContentLoaded', function () {
    const userForm = document.getElementById('dokanForm');
    const dokanNameInput = document.getElementById('dokan_name');
    const dokanAddressInput = document.getElementById('dokan_address');
    const dokanOwnerInput = document.getElementById('dokan_owner_name');
    const dokanTypeInput = document.getElementById('dokan_type');
    const dokanRentInput = document.getElementById('dokan_rent');

    function validateForm(event) {
        event.preventDefault();
        let isValid = true;
        const errorSpans = document.querySelectorAll('.error');
        errorSpans.forEach(span => {
            span.textContent = '';
        });
        const inputFields = document.querySelectorAll('.form-control');
        inputFields.forEach(field => {
            field.classList.remove('is-invalid');
        });

        // Validate each input field
        if (!dokanNameInput.value.trim()) {
            document.getElementById('dokan_name_err').textContent = 'براہ کرم دکان کا نام درج کریں۔';
            dokanNameInput.classList.add('is-invalid');
            isValid = false;
        }
        if (!dokanAddressInput.value.trim()) {
            document.getElementById('dokan_address_err').textContent = 'براہ کرم دکان کا پتہ درج کریں۔';
            dokanAddressInput.classList.add('is-invalid');
            isValid = false;
        }
        if (!dokanOwnerInput.value.trim()) {
            document.getElementById('dokan_owner_name_err').textContent = 'براہ کرم دکان کے مالک کا نام درج کریں۔';
            dokanOwnerInput.classList.add('is-invalid');
            isValid = false;
        }
        if (!dokanTypeInput.value.trim()) {
            document.getElementById('dokan_type_err').textContent = 'براہ کرم دکان کی قسم درج کریں۔';
            dokanTypeInput.classList.add('is-invalid');
            isValid = false;
        }
        if (!dokanRentInput.value.trim()) {
            document.getElementById('dokan_rent_err').textContent = 'براہ کرم دکان کا کرایہ درج کریں۔';
            dokanRentInput.classList.add('is-invalid');
            isValid = false;
        }
        if (isValid) {
            userForm.submit();
        }
    }

    userForm.addEventListener('submit', validateForm);


    // Event listener to clear error messages when input is changed
    dokanNameInput.addEventListener('input', clearError);
    dokanAddressInput.addEventListener('input', clearError);
    dokanOwnerInput.addEventListener('input', clearError);
    dokanTypeInput.addEventListener('input', clearError);
    dokanRentInput.addEventListener('input', clearError);



    function clearError() {
        this.classList.remove('is-invalid');
        const errorId = this.id + '_err';
        document.getElementById(errorId).textContent = '';
    }
});