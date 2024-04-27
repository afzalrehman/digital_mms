document.addEventListener('DOMContentLoaded', function () {
  function initializeFormValidation() {
      // Function to validate numeric input fields
      function validateNumericInput(inputElement, errorElement) {
          inputElement.addEventListener('input', function () {
              const inputValue = inputElement.value.trim();
              const numericValue = inputValue.replace(/\D/g, ''); // Remove non-numeric characters

              if (inputValue !== numericValue) { // If non-numeric characters are present
                  errorElement.textContent = 'صرف نمبرز ٹائپ کریں۔';
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
      const feesTypesInput = document.getElementById('fees_type_amount');
      const feesTypesError = document.getElementById('fees_type_amount_err');
      validateNumericInput(feesTypesInput, feesTypesError);

      // JavaScript validation code
      const userForm = document.getElementById('stFeesTypesForm');
      const regNumberInput = document.getElementById('fees_type_name');
      const stdNameInput = document.getElementById('fees_type_amount');

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
          if (!regNumberInput.value.trim()) {
              document.getElementById('fees_type_name_err').textContent = 'فیس کا نام ٹائپ کریں۔';
              regNumberInput.classList.add('is-invalid');
              isValid = false;
          }
          if (!stdNameInput.value.trim()) {
              document.getElementById('fees_type_amount_err').textContent = 'فیس کی رقم ٹائپ کریں۔';
              stdNameInput.classList.add('is-invalid');
              isValid = false;
          }

          if (isValid) {
              userForm.submit();
          }
      }

      userForm.addEventListener('submit', validateForm);

      // Event listener to clear error messages when input is changed
      regNumberInput.addEventListener('input', clearError);
      stdNameInput.addEventListener('input', clearError);

      function clearError() {
          this.classList.remove('is-invalid');
          const errorId = this.id + '_err';
          document.getElementById(errorId).textContent = '';
      }
  }

  // Call the function to initialize form validation
  initializeFormValidation();
});
