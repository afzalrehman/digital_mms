const form = document.getElementById("MadarsaAdd");

const myConstants = {
//   teacherInput: {
//     element: document.getElementById("teacherName"),
//     error: document.querySelector(".teacher_name"),
//     minLength: 3,
//     errorMessage:
//       "Teacher name cannot be empty and must be at least 3 characters long",
//   },
  rigisterNumber: {
    element: document.getElementById("RegNumber"),
    error: document.querySelector(".RegNumber"),
    minLength: 3,
    errorMessage:
      "براۓ مہربانی رجسٹر نمبر ایڈ کریں",
  },
  Name: {
    element: document.getElementById("Name"),
    error: document.querySelector(".Name"),
    errorMessage: "براۓ مہربانی مدرسہ کا نام ایڈ کریں",
  },
//   ins_Name: {
//     element: document.getElementById("ins_id"),
//     error: document.querySelector(".InsIdError"),
//     errorMessage: "Institute name & ID cannot be empty",
//   },
madDate: {
    element: document.getElementById("madDate"),
    error: document.querySelector(".madDate"),
    errorMessage: "براۓ مہربانی مدرسہ کا تاریخ پیدائش درج کریں",
},

//   JoiningDate: {
//     element: document.getElementById("Date"),
//     error: document.querySelector(".joinDate"),
//     errorMessage: "Joining date cannot be empty",
//   },
//   TeacherCnic: {
//     element: document.getElementById("TeacherCnic"),
//     error: document.querySelector(".TeacherCnic"),
//     errorMessage:
//       "CNIC cannot be empty and must be in the format XXXXX-XXXXXXX-X",
//     pattern: /^\d{5}-\d{7}-\d{1}$/, // Regular expression for Pakistani CNIC format
//   },
madAddress: {
    element: document.getElementById("madAddress"),
    error: document.querySelector(".madAddress"),
    minLength: 5,
    errorMessage:
      "براۓ مہربانی مدرسہ کا پتہ درج کریں اور 5 حروف سے زیادہ ہونا چاہئے",
},

madCity: {
    element: document.getElementById("madCity"),
    error: document.querySelector(".madCity"),
    minLength: 5,
    errorMessage:
      "براۓ مہربانی شہر کا نام درج کریں اور 5 حروف سے زیادہ ہونا چاہئے",
},


madPhone: {
    element: document.getElementById("madPhone"),
    error: document.querySelector(".madPhone"),
    maxLength: 11,
    errorMessage:
        "فون نمبر 11 ہنریں لمبا ہونا چاہئے اور صفر یا تین سے شروع ہونا چاہئے",
    pattern: /^03[0-4]\d{8}$/,  // Pakistani phone number format ke liye regular expression
},


//   teacherFatherInput: {
//     element: document.getElementById("FatherName"),
//     error: document.querySelector(".FatherName"),
//     minLength: 3,
//     errorMessage:
//       "Father cannot be empty and must be at least 3 characters long",
//   },
//   ins_Gender: {
//     element: document.getElementById("TeacherGender"),
//     error: document.querySelector(".TeacherGender"),
//     errorMessage: "Institute name & ID cannot be empty",
//   },
//   TeacherQualification: {
//     element: document.getElementById("TeacherQualification"),
//     error: document.querySelector(".TeacherQualification"),
//     errorMessage: "Institute name & ID cannot be empty",
//   },
//   teacherDesignationInput: {
//     element: document.getElementById("Designation"),
//     error: document.querySelector(".Designation"),
//     minLength: 3,
//     errorMessage:
//       "Designation cannot be empty and must be at least 3 characters long",
//   },
madEmail: {
    element: document.getElementById("madEmail"),
    error: document.querySelector(".madEmail"),
    minLength: 3,
    errorMessage:
      "براۓ مہربانی ای میل درج کریں اور 3 حروف سے زیادہ ہونا چاہئے",
    pattern: /^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/, // ای میل پیٹرن
},
};

function validateInput(input) {
  const trimmedValue = input.element.value.trim();
  let isValid = true;

  if (trimmedValue === "") {
    input.error.textContent = input.errorMessage;
    input.element.classList.add("error-border");
    isValid = false;
  } else if (input.pattern && !input.pattern.test(trimmedValue)) {
    input.error.textContent = input.errorMessage;
    input.element.classList.add("error-border");
    isValid = false;
  } else if (input.minLength && trimmedValue.length < input.minLength) {
    input.error.textContent = input.errorMessage;
    input.element.classList.add("error-border");
    isValid = false;
  } else if (input.maxLength && trimmedValue.length > input.maxLength) {
    input.error.textContent = input.errorMessage;
    input.element.classList.add("error-border");
    isValid = false;
  } else {
    input.error.textContent = "";
    input.element.classList.remove("error-border");
  }

  return isValid;
}

function validateForm() {
  let isValid = true;

  for (const key in myConstants) {
    if (!validateInput(myConstants[key])) {
      isValid = false;
    }
  }

  return isValid;
}

form.addEventListener("submit", function (event) {
  if (!validateForm()) {
    event.preventDefault();
  }
});

for (const key in myConstants) {
  myConstants[key].element.addEventListener("input", function () {
    if (key === "rigisterNumber") {
      this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    }
    validateForm();
  });
}
