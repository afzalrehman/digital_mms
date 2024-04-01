// ========================================================================

document.addEventListener('DOMContentLoaded', function () {
    const announcementForm = document.getElementById('annoucement_form');
    const announcementDepartSelect = document.getElementById('annoucment_depart');
    const announcementNameSelect = document.getElementById('annoucment_name');
    const announcementDateInput = document.getElementById('annoucment_date');
    const announcementTypeSelect = document.getElementById('annoucment_type');
    const announcementSubjectInput = document.getElementById('annoucment_subject');
    const announcementNoteTextarea = document.getElementById('annoucement_note');

    // Function to validate form
    function validateForm(event) {
        event.preventDefault(); // Prevent form submission

        let isValid = true;

        // Reset error messages and remove 'is-invalid' class from input fields
        const errorSpans = document.querySelectorAll('.error');
        errorSpans.forEach(span => {
            span.textContent = '';
        });

        // Remove 'is-invalid' class from input fields
        const inputFields = document.querySelectorAll('.form-control');
        inputFields.forEach(field => {
            field.classList.remove('is-invalid');
        });

        // Validate each input field
        if (announcementDepartSelect.value === '') {
            document.getElementById('annoucment_depart_err').textContent = 'Please select a department.';
            announcementDepartSelect.classList.add('is-invalid');
            isValid = false;
        }

        if (announcementNameSelect.value === '') {
            document.getElementById('annoucment_name_err').textContent = 'Please select a name.';
            announcementNameSelect.classList.add('is-invalid');
            isValid = false;
        }

        if (!announcementDateInput.value.trim()) {
            document.getElementById('annoucment_date_err').textContent = 'Please select a date.';
            announcementDateInput.classList.add('is-invalid');
            isValid = false;
        }

        if (announcementTypeSelect.value === '') {
            document.getElementById('annoucment_type_err').textContent = 'Please select an announcement type.';
            announcementTypeSelect.classList.add('is-invalid');
            isValid = false;
        }

        if (!announcementSubjectInput.value.trim()) {
            document.getElementById('annoucment_subject_err').textContent = 'Please enter a subject.';
            announcementSubjectInput.classList.add('is-invalid');
            isValid = false;
        }

        if (!announcementNoteTextarea.value.trim()) {
            document.getElementById('annoucement_note_err').textContent = 'Please enter an announcement.';
            announcementNoteTextarea.classList.add('is-invalid');
            isValid = false;
        }

        if (isValid) {
            announcementForm.submit(); // Submit the form if all inputs are valid
        }
    }

    // Event listener
    document.getElementById('submit_annoucement').addEventListener('click', validateForm);
});
