// ====================== number only admission fees ======================
document.addEventListener('DOMContentLoaded', function () {
    // Function to validate numeric input fields
    function validateNumericInput(inputElement, errorElement) {
        inputElement.addEventListener('input', function () {
            const inputValue = inputElement.value.trim();
            const numericValue = inputValue.replace(/\D/g, ''); // Remove non-numeric characters

            if (inputValue !== numericValue) { // If non-numeric characters are present
                errorElement.textContent = '';
                errorElement.style.display = 'block';
                inputElement.classList.add('is-invalid');
            } else {
                errorElement.textContent = ''; // Clear error message
                errorElement.style.display = 'none';
                inputElement.classList.remove('is-invalid');
            }

            // Update the input value with the cleaned numeric value
            inputElement.value = numericValue;
        });

        // Ensure error message is displayed on initial load if there's an invalid value
        if (inputElement.value.trim() !== inputElement.value.replace(/\D/g, '')) {
            errorElement.textContent = '';
            errorElement.style.display = 'block';
            inputElement.classList.add('is-invalid');
        }
    }

    // Validate phone number input
    const payFeesInput = document.getElementById('pay_amount');
    const payFeesError = document.getElementById('pay_amount_err');
    validateNumericInput(payFeesInput, payFeesError);

    // Validate age input
    const remainingFeesInput = document.getElementById('pay_remaining_rent');
    const remainingFeesError = document.getElementById('pay_remaining_rent_err');
    validateNumericInput(remainingFeesInput, remainingFeesError);

});







// ======================== Validation of fields  ======================
document.addEventListener('DOMContentLoaded', function () {
    const userForm = document.getElementById('dokanRentForm');
    const dokanNameInput = document.getElementById('dokan_name');
    const payAmountInput = document.getElementById('pay_amount');
    const payRentDateINput = document.getElementById('pay_rent_date');

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
        if (!payAmountInput.value.trim()) {
            document.getElementById('pay_amount_err').textContent = 'براہ کرم دکان کا پتہ درج کریں۔';
            payAmountInput.classList.add('is-invalid');
            isValid = false;
        }
        if (!payRentDateINput.value.trim()) {
            document.getElementById('pay_rent_date_err').textContent = 'براہ کرم پرائیمنٹ کا طہر درج کریں۔';
            payRentDateINput.classList.add('is-invalid');
            isValid = false;
        }

        if (isValid) {
            userForm.submit();
        }
    }

    userForm.addEventListener('submit', validateForm);


    // Event listener to clear error messages when input is changed
    dokanNameInput.addEventListener('input', clearError);
    payAmountInput.addEventListener('input', clearError);
    payRentDateINput.addEventListener('input', clearError);



    function clearError() {
        this.classList.remove('is-invalid');
        const errorId = this.id + '_err';
        document.getElementById(errorId).textContent = '';
    }
});