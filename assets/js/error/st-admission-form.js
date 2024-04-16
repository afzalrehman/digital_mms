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
// document.addEventListener('DOMContentLoaded', function () {
//     const usernameInput = document.getElementById('username');
//     const usernameError = document.getElementById('username_err');

//     usernameInput.addEventListener('input', function () {
//         let inputValue = usernameInput.value.trim();

//         // Convert input value to lowercase
//         inputValue = inputValue.toLowerCase();
//         usernameInput.value = inputValue;

//         // Check if input value is empty
//         if (inputValue === '') {
//             usernameError.textContent = 'براہ کرم یوزَر نام درج کریں۔';
//             usernameError.style.display = 'block';
//             usernameInput.classList.add('is-invalid');
//         }
//         // Check if input value contains characters other than lowercase letters, '.', '-', '_'
//         else if (!/^[a-z._-]+$/.test(inputValue)) {
//             usernameError.textContent = 'Username should contain only lowercase letters, ".", "-", or "_".';
//             usernameError.style.display = 'block';
//             usernameInput.classList.add('is-invalid');
//         } else {
//             usernameError.textContent = '';
//             usernameError.style.display = 'none';
//             usernameInput.classList.remove('is-invalid');
//         }
//     });
// });



// // ========================================================================
// document.addEventListener('DOMContentLoaded', function () {
//     // Selecting form elements
//     const userForm = document.getElementById('st-admission-form');
//     const regNumberInput = document.getElementById('reg_number');
//     const stdNameInput = document.getElementById('std_name');
//     const stdDboInput = document.getElementById('std_dbo');
//     const stdGenderSelect = document.getElementById('std_gender');
//     const stdAccommodationSelect = document.getElementById('std_accommodation');
//     const stdBirthPlaceInput = document.getElementById('std_birth_place');
//     const stdAddressInput = document.getElementById('std_address');
//     const guarNameInput = document.getElementById('guar_name');
//     const guarRelationInput = document.getElementById('guar_relation');
//     const guarNumberInput = document.getElementById('guar_number');
//     const guarCnicInput = document.getElementById('guar_cnic');
//     const guarAddressInput = document.getElementById('guar_address');
//     const guarEmailInput = document.getElementById('guar_email');
//     const preSchoolInput = document.getElementById('pre_school');
//     const preClassInput = document.getElementById('pre-class');
//     const nextClassInput = document.getElementById('next-class');
//     const admDateInput = document.getElementById('adm_date');

//     const studentMadarasaSelect = document.getElementById('studentMadarasa');
//     const madYearSelect = document.getElementById('MadYear');
//     const departmentSelect = document.getElementById('department');
//     const studentClassSelect = document.getElementById('studentclass');
//     const sectionSelect = document.getElementById('section');

//     const stdQadeemSelect = document.getElementById('std_qadeem');
//     const admiFeesInput = document.getElementById('admi_fees');
//     const monthlyFeesInput = document.getElementById('monthly_fees');

//     // Function to validate form
//     function validateForm(event) {
//         event.preventDefault(); // Prevent form submission

//         let isValid = true;

//         // Reset error messages and borders
//         const errorSpans = document.querySelectorAll('.error');
//         errorSpans.forEach(span => {
//             span.textContent = '';
//         });
//         const inputFields = document.querySelectorAll('.form-control');
//         inputFields.forEach(field => {
//             field.classList.remove('is-invalid');
//         });

//         // Validate each input field
//         if (!regNumberInput.value.trim()) {
//             document.getElementById('reg_number_err').textContent = 'برائے کرم جی آر نمبر درج کریں۔';
//             regNumberInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!stdNameInput.value.trim()) {
//             document.getElementById('std_name_err').textContent = 'براہ کرم طالب علم کا نام درج کریں۔';
//             stdNameInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!stdDboInput.value.trim()) {
//             document.getElementById('std_dbo_err').textContent = 'براہ کرم تاریخ پیدائش درج کریں۔';
//             stdDboInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!stdGenderSelect.value) {
//             document.getElementById('std_gender_err').textContent = 'براہ کرم جنس منتخب کریں۔';
//             stdGenderSelect.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!stdAccommodationSelect.value) {
//             document.getElementById('std_accommodation_err').textContent = 'براہ کرم رہائش کا انتخاب کریں۔';
//             stdAccommodationSelect.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!stdBirthPlaceInput.value.trim()) {
//             document.getElementById('std_birth_place_err').textContent = 'براہ کرم مقام پیدائش درج کریں۔';
//             stdBirthPlaceInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!stdAddressInput.value.trim()) {
//             document.getElementById('std_address_err').textContent = 'براہ کرم پتہ درج کریں۔';
//             stdAddressInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!guarNameInput.value.trim()) {
//             document.getElementById('guar_name_err').textContent = 'براہ کرم سرپرست کا نام درج کریں۔';
//             guarNameInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!guarRelationInput.value.trim()) {
//             document.getElementById('guar_relation_err').textContent = 'براہ کرم سرپرست کا رشتہ درج کریں۔';
//             guarRelationInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!guarNumberInput.value.trim()) {
//             document.getElementById('guar_number_err').textContent = 'براہ کرم سرپرست نمبر درج کریں۔';
//             guarNumberInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!guarCnicInput.value.trim()) {
//             document.getElementById('guar_cnic_err').textContent = 'براہ کرم سرپرست CNIC درج کریں۔';
//             guarCnicInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!guarAddressInput.value.trim()) {
//             document.getElementById('guar_address_err').textContent = 'براہ کرم سرپرست کا پتہ درج کریں۔';
//             guarAddressInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!guarEmailInput.value.trim()) {
//             document.getElementById('guar_email_err').textContent = 'براہ کرم سرپرست ای میل درج کریں۔';
//             guarEmailInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!preSchoolInput.value.trim()) {
//             document.getElementById('pre_school_err').textContent = 'براہ کرم سابقہ مدرسہ درج کریں۔';
//             preSchoolInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!preClassInput.value.trim()) {
//             document.getElementById('pre_class_err').textContent = 'براہ کرم سابقہ درجہ درج کریں۔';
//             preClassInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!nextClassInput.value.trim()) {
//             document.getElementById('next_class_err').textContent = 'براہ کرم مطلوبہ درجہ درج کریں۔';
//             nextClassInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!admDateInput.value.trim()) {
//             document.getElementById('adm_date_err').textContent = 'براہ کرم تاریخ داخلہ درج کریں۔';
//             admDateInput.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!studentMadarasaSelect.value) {
//             document.getElementById('studentMadarasa_err').textContent = 'براہ کرم مدرسہ منتخب کریں۔';
//             studentMadarasaSelect.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!madYearSelect.value) {
//             document.getElementById('MadYear_err').textContent = 'براہ کرم تعلیمی سال منتخب کریں۔';
//             madYearSelect.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!departmentSelect.value) {
//             document.getElementById('department_err').textContent = 'براہ کرم شعبہ منتخب کریں۔';
//             departmentSelect.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!studentClassSelect.value) {
//             document.getElementById('class_err').textContent = 'براہ کرم سیکشن منتخب کریں۔';
//             studentClassSelect.classList.add('is-invalid');
//             isValid = false;
//         }

//         if (!sectionSelect.value) {
//             document.getElementById('section_err').textContent = 'براہ کرم سابقہ سیکشن منتخب کریں۔';
//             sectionSelect.classList.add('is-invalid');
//             isValid = false;
//         }


//         if (!stdQadeemSelect.value) {
//             document.getElementById('std_qadeem_err').textContent = 'براہ کرم سابقہ منتخب کریں۔';
//             stdQadeemSelect.classList.add('is-invalid');
//             isValid = false;
//         }


//         if (isValid) {
//             userForm.submit(); // Submit the form if all inputs are valid
//         }
//     }

//     // Event listener to validate form on submit
//     userForm.addEventListener('submit', validateForm);

//     // Event listener to clear error messages when input is changed
//     regNumberInput.addEventListener('input', function () {
//         document.getElementById('reg_number_err').textContent = '';
//         regNumberInput.classList.remove('is-invalid');
//     });

//     stdNameInput.addEventListener('input', function () {
//         document.getElementById('std_name_err').textContent = '';
//         stdNameInput.classList.remove('is-invalid');
//     });

//     stdDboInput.addEventListener('input', function () {
//         document.getElementById('std_dbo_err').textContent = '';
//         stdDboInput.classList.remove('is-invalid');
//     });

//     stdDboInput.addEventListener('input', function () {
//         document.getElementById('std_dbo_err').textContent = '';
//         stdDboInput.classList.remove('is-invalid');
//     });

//     stdGenderSelect.addEventListener('input', function () {
//         document.getElementById('std_gender_err').textContent = '';
//         stdGenderSelect.classList.remove('is-invalid');
//     });

//     stdAccommodationSelect.addEventListener('input', function () {
//         document.getElementById('std_accommodation_err').textContent = '';
//         stdAccommodationSelect.classList.remove('is-invalid');
//     });

//     stdBirthPlaceInput.addEventListener('input', function () {
//         document.getElementById('std_birth_place_err').textContent = '';
//         stdBirthPlaceInput.classList.remove('is-invalid');
//     });

//     stdAddressInput.addEventListener('input', function () {
//         document.getElementById('std_address_err').textContent = '';
//         stdAddressInput.classList.remove('is-invalid');
//     });

//     guarNameInput.addEventListener('input', function () {
//         document.getElementById('guar_name_err').textContent = '';
//         guarNameInput.classList.remove('is-invalid');
//     });

//     guarRelationInput.addEventListener('input', function () {
//         document.getElementById('guar_relation_err').textContent = '';
//         guarRelationInput.classList.remove('is-invalid');
//     });

//     guarNumberInput.addEventListener('input', function () {
//         document.getElementById('guar_number_err').textContent = '';
//         guarNumberInput.classList.remove('is-invalid');
//     });

//     guarCnicInput.addEventListener('input', function () {
//         document.getElementById('guar_cnic_err').textContent = '';
//         guarCnicInput.classList.remove('is-invalid');
//     });

//     guarAddressInput.addEventListener('input', function () {
//         document.getElementById('guar_address_err').textContent = '';
//         guarAddressInput.classList.remove('is-invalid');
//     });

//     guarEmailInput.addEventListener('input', function () {
//         document.getElementById('guar_email_err').textContent = '';
//         guarEmailInput.classList.remove('is-invalid');
//     });

//     guarEmailInput.addEventListener('input', function () {
//         document.getElementById('guar_email_err').textContent = '';
//         guarEmailInput.classList.remove('is-invalid');
//     });

//     preSchoolInput.addEventListener('input', function () {
//         document.getElementById('pre_school_err').textContent = '';
//         preSchoolInput.classList.remove('is-invalid');
//     });

//     preClassInput.addEventListener('input', function () {
//         document.getElementById('pre_class_err').textContent = '';
//         preClassInput.classList.remove('is-invalid');
//     });

//     nextClassInput.addEventListener('input', function () {
//         document.getElementById('next_class_err').textContent = '';
//         nextClassInput.classList.remove('is-invalid');
//     });

//     admDateInput.addEventListener('input', function () {
//         document.getElementById('adm_date_err').textContent = '';
//         admDateInput.classList.remove('is-invalid');
//     });

//     studentMadarasaSelect.addEventListener('input', function () {
//         document.getElementById('studentMadarasa_err').textContent = '';
//         studentMadarasaSelect.classList.remove('is-invalid');
//     });

//     madYearSelect.addEventListener('input', function () {
//         document.getElementById('MadYear_err').textContent = '';
//         madYearSelect.classList.remove('is-invalid');
//     });

//     departmentSelect.addEventListener('input', function () {
//         document.getElementById('department_err').textContent = '';
//         departmentSelect.classList.remove('is-invalid');
//     });

//     studentClassSelect.addEventListener('input', function () {
//         document.getElementById('class_err').textContent = '';
//         studentClassSelect.classList.remove('is-invalid');
//     });

//     sectionSelect.addEventListener('input', function () {
//         document.getElementById('section_err').textContent = '';
//         sectionSelect.classList.remove('is-invalid');
//     });

//     stdQadeemSelect.addEventListener('input', function () {
//         document.getElementById('std_qadeem_err').textContent = '';
//         stdQadeemSelect.classList.remove('is-invalid');
//     });

// });



document.addEventListener('DOMContentLoaded', function () {
    // Selecting form elements
    const userForm = document.getElementById('st-admission-form');
    const inputFields = userForm.querySelectorAll('.form-control');
    const errorSpans = userForm.querySelectorAll('.error');

    // Function to validate form
    function validateForm(event) {
        event.preventDefault(); // Prevent form submission
        let isValid = true;

        // Reset error messages and borders
        errorSpans.forEach(span => span.textContent = '');
        inputFields.forEach(field => field.classList.remove('is-invalid'));

        // Validate each input field
        inputFields.forEach(field => {
            if (!field.value.trim()) {
                const errorId = `${field.id}_err`;
                const errorMessage = ``;
                const errorSpan = document.getElementById(errorId);
                errorSpan.textContent = errorMessage;
                field.classList.add('is-invalid');
                isValid = false;
            }
        });

        if (isValid) {
            userForm.submit(); // Submit the form if all inputs are valid
        }
    }

    // Event listener to validate form on submit
    userForm.addEventListener('submit', validateForm);

    // Event listener to clear error messages when input is changed
    inputFields.forEach(field => {
        field.addEventListener('input', function () {
            const errorId = `${field.id}_err`;
            const errorSpan = document.getElementById(errorId);
            errorSpan.textContent = '';
            field.classList.remove('is-invalid');
        });
    });
});

