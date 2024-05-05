// ==============================student Admission code for validation========================================
const EnrollStudent = document.getElementById("st-admission-form");

const EnrollStudent_error = {
  EnrollStudentName: {
    enrollStudent: document.getElementById("reg_number"),
    errorStudentEnroll: document.querySelector(".reg_number"),
    minLengthStudentEnroll: 3,
    errorMessageStudentEnroll:
      "براۓ مہربانی جی آر نمبر ایڈ کریں",
  },

  std_name: {
    enrollStudent: document.getElementById("std_name"),
    errorStudentEnroll: document.querySelector(".std_name"),
    minLengthStudentEnroll: 3,
    errorMessageStudentEnroll:
      "براۓ مہربانی نام ایڈ کریں",
  },

  StudentdateBirth: {
    enrollStudent: document.getElementById("std_dbo"),
    errorStudentEnroll: document.querySelector(".std_dbo"),
    errorMessageStudentEnroll: "براۓ مہربانی تاریخ پیدائش ایڈ کریں",
  },
  std_birth_place: {
    enrollStudent: document.getElementById("std_birth_place"),
    errorStudentEnroll: document.querySelector(".std_birth_place"),
    errorMessageStudentEnroll:
      "براۓ مہربانی مقام پیدائش ایڈکریں",
  },
  std_gender: {
    enrollStudent: document.getElementById("std_gender"),
    errorStudentEnroll: document.querySelector(".std_gender"),
    errorMessageStudentEnroll: "براۓ مہربانی صنف ایڈ کریں",
  },
  std_accommodation: {
    enrollStudent: document.getElementById("std_accommodation"),
    errorStudentEnroll: document.querySelector(".std_accommodation"),
    errorMessageStudentEnroll:
      "براۓ مہربانی رہائش منتخب کریں",
  },
 
  std_address: {
    enrollStudent: document.getElementById("std_address"),
    errorStudentEnroll: document.querySelector(".std_address"),
    errorMessageStudentEnroll:
      "براۓ مہربانی پتہ ایڈ کریں",
  },
  guar_name: {
    enrollStudent: document.getElementById("guar_name"),
    errorStudentEnroll: document.querySelector(".guar_name"),
    errorMessageStudentEnroll:
      "براۓ مہربانی سرپرست کا نام ایڈ کریں",
  },
  guar_relation: {
    enrollStudent: document.getElementById("guar_relation"),
    errorStudentEnroll: document.querySelector(".guar_relation"),
    errorMessageStudentEnroll:
      "براۓ مہربانی سرپرست سے رشتہ ایڈ کریں",
  },

  StudentCnic: {
    enrollStudent: document.getElementById("guar_cnic"),
    errorStudentEnroll: document.querySelector(".guar_cnic"),
    errorMessageStudentEnroll:
      "براۓ مہربانی شناختی کارڈ نمبر ایڈ کریں",
    pattern: /^\d{5}-\d{7}-\d{1}$/, // Regular expression for Pakistani CNIC format
  },
  guar_address: {
    enrollStudent: document.getElementById("guar_address"),
    errorStudentEnroll: document.querySelector(".guar_address"),
    minLengthStudentEnroll: 5,
    errorMessageStudentEnroll:
      "براۓ مہربانی پتہ ایڈ کریں",
  },

  StudentPhone: {
    enrollStudent: document.getElementById("guar_number"),
    errorStudentEnroll: document.querySelector(".guar_number"),
    minLengthStudentEnroll: 11,
    errorMessageStudentEnroll:
      "براۓ مہربانی فون نمبر ایڈ کریں",
    pattern: /^03[0-4]\d{8}$/, // Regular expression for Pakistani phone number format
  },


  pre_school: {
    enrollStudent: document.getElementById("pre_school"),
    errorStudentEnroll: document.querySelector(".pre_school"),
    errorMessageStudentEnroll: "براۓ مہربانی مدرسہ سلیکٹ کریں",
  },
  pre_class: {
    enrollStudent: document.getElementById("pre_class"),
    errorStudentEnroll: document.querySelector(".pre_class"),
    errorMessageStudentEnroll: "براۓ مہربانی سابقہ درجہ سلیکٹ کریں",
  },
  next_class: {
    enrollStudent: document.getElementById("next_class"),
    errorStudentEnroll: document.querySelector(".next_class"),
    errorMessageStudentEnroll: "براۓ مہربانی مطلوبہ درجہ سلیکٹ کریں",
  },
  adm_date: {
    enrollStudent: document.getElementById("adm_date"),
    errorStudentEnroll: document.querySelector(".adm_date"),
    errorMessageStudentEnroll: "Please Fill cannot be empty",
  },
  studentMadarasa: {
    enrollStudent: document.getElementById("studentMadarasa"),
    errorStudentEnroll: document.querySelector(".studentMadarasa"),
    errorMessageStudentEnroll: "براۓ مہربانی تاریخ داخلہ ایڈ کریں",
  },

  MadYear: {
    enrollStudent: document.getElementById("MadYear"),
    errorStudentEnroll: document.querySelector(".MadYear"),
    errorMessageStudentEnroll: "براۓ مہربانی تعلیمی سال منتخب کریں",
  },

  department: {
    enrollStudent: document.getElementById("department"),
    errorStudentEnroll: document.querySelector(".department"),
    errorMessageStudentEnroll: "براۓ مہربانی شعبہ منتخب کریں",
  },

  studentclass: {
    enrollStudent: document.getElementById("studentclass"),
    errorStudentEnroll: document.querySelector(".studentclass"),
    errorMessageStudentEnroll: "براۓ مہربانی کلاس سلیکٹ کریں",
  },
  section: {
    enrollStudent: document.getElementById("section"),
    errorStudentEnroll: document.querySelector(".section"),
    errorMessageStudentEnroll: "براۓ مہربانی سیکشن منتخب کریں",
  },
  std_qadeem: {
    enrollStudent: document.getElementById("std_qadeem"),
    errorStudentEnroll: document.querySelector(".std_qadeem"),
    errorMessageStudentEnroll: "براۓ مہربانی منتخب کریں",
  },
  admi_fees: {
    enrollStudent: document.getElementById("admi_fees"),
    errorStudentEnroll: document.querySelector(".admi_fees"),
    errorMessageStudentEnroll: "براۓ مہربانی داخلہ فیس منتخب کریں",
  },
  monthly_fees: {
    enrollStudent: document.getElementById("monthly_fees"),
    errorStudentEnroll: document.querySelector(".monthly_fees"),
    errorMessageStudentEnroll: "براۓ مہربانی ماہانہ فیس منتخب کریں",
  },

  StudentEmailInput: {
    enrollStudent: document.getElementById("guar_email"),
    errorStudentEnroll: document.querySelector(".guar_email"),
    minLengthStudentEnroll: 3,
    errorMessageStudentEnroll:
      "براۓ مہربانی ای میل ایڈ کریں",
    pattern: /^[\w-]+(\.[\w-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/, // Email pattern
  },
};

function validateInputEnrollStudent(input) {
  const trimmedValue1 = input.enrollStudent.value.trim();
  let isValid1 = true;

  if (trimmedValue1 === "") {
    input.errorStudentEnroll.textContent = input.errorMessageStudentEnroll;
    input.enrollStudent.classList.add("error-border");
    isValid1 = false;
  } else if (input.pattern && !input.pattern.test(trimmedValue1)) {
    input.errorStudentEnroll.textContent = input.errorMessageStudentEnroll;
    input.enrollStudent.classList.add("error-border");
    isValid1 = false;
  } else if (
    input.minLengthStudentEnroll &&
    trimmedValue1.length < input.minLengthStudentEnroll
  ) {
    input.errorStudentEnroll.textContent = input.errorMessageStudentEnroll;
    input.enrollStudent.classList.add("error-border");
    isValid1 = false;
  }
  // else if (input.maxLength && trimmedValue1.length > input.maxLength) {
  //   input.errorStudentEnroll.textContent = input.errorMessageStudentEnroll;
  //   input.enrollStudent.classList.add("error-border");
  //   isValid1 = false;
  // }
  else {
    input.errorStudentEnroll.textContent = "";
    input.enrollStudent.classList.remove("error-border");
  }

  return isValid1;
}

function validateFormEnrollStudent() {
  let isValid1 = true;

  for (const key in EnrollStudent_error) {
    if (!validateInputEnrollStudent(EnrollStudent_error[key])) {
      isValid1 = false;
    }
  }

  return isValid1;
}

EnrollStudent.addEventListener("submit", function (event) {
  if (!validateFormEnrollStudent()) {
    event.preventDefault();
  }
});

for (const key in EnrollStudent_error) {
  EnrollStudent_error[key].enrollStudent.addEventListener("input", function () {
    if (key === "EnrollStudent_error") {
      this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    }
    validateFormEnrollStudent();
  });
}
EnrollStudent_error.StudentCity.toUpper();
EnrollStudent_error.StudentFatherInput.toUpper();
