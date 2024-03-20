const form = document.getElementById("Teaher");

const myConstants = {
  rigisterNumber: {
    element: document.getElementById("RegNumber"),
    error: document.querySelector(".RegNumber"),
    minLength: 3,
    errorMessage: "براۓ مہربانی رجسٹر نمبر ایڈ کریں",
  },
  Name: {
    element: document.getElementById("Name"),
    error: document.querySelector(".Name"),
    errorMessage: "براۓ مہربانی  نام ایڈ کریں",
  },
  Fname: {
    element: document.getElementById("Fname"),
    error: document.querySelector(".Fname"),
    errorMessage: "براۓ مہربانی  والد کا نام ایڈ کریں",
  },
  mad_Name: {
    element: document.getElementById("mad_Name"),
    error: document.querySelector(".mad_Name"),
    errorMessage: "براۓ مہربانی مدرسہ درج کریں",
  },
  DateOfB: {
    element: document.getElementById("DateOfB"),
    error: document.querySelector(".DateOfB"),
    errorMessage: "براۓ مہربانی تاریخ پیدائش درج کریں",
  },
  gender: {
    element: document.getElementById("gender"),
    error: document.querySelector(".gender"),
    errorMessage: "براۓ مہربانی صنف درج کریں",
  },

  Address: {
    element: document.getElementById("Address"),
    error: document.querySelector(".Address"),
    minLength: 5,
    errorMessage: "براۓ مہربانی  پتہ درج کریں اور 5 حروف سے زیادہ ہونا چاہئے",
  },

  Degree: {
    element: document.getElementById("Degree"),
    error: document.querySelector(".Degree"),
    minLength: 5,
    errorMessage: "براۓ مہربانی  تعلیم درج کریں اور 5 حروف سے زیادہ ہونا چاہئے",
  },

  phone: {
    element: document.getElementById("phone"),
    error: document.querySelector(".phone"),
    maxLength: 11,
    errorMessage:
      "فون نمبر 11 ہنریں لمبا ہونا چاہئے اور صفر یا تین سے شروع ہونا چاہئے",
    pattern: /^03[0-4]\d{8}$/, // Pakistani phone number format ke liye regular expression
  },

  Experence: {
    element: document.getElementById("Experence"),
    error: document.querySelector(".Experence"),
    minLength: 3,
    errorMessage: " براۓ مہربانی تعلیم درج کریں اور 3 حروف سے زیادہ ہونا چاہئے",
  },

  Subject: {
    element: document.getElementById("Subject"),
    error: document.querySelector(".Subject"),
    minLength: 3,
    errorMessage: " براۓ مہربانی کتاب درج کریں اور 3 حروف سے زیادہ ہونا چاہئے",
  },
  Class: {
    element: document.getElementById("Class"),
    error: document.querySelector(".Class"),
    errorMessage: "براۓ مہربانی کلاس درج کریں ",
  },
  TeaType: {
    element: document.getElementById("TeaType"),
    error: document.querySelector(".TeaType"),
    errorMessage: "براۓ مہربانی ملازمت درج کریں ",
  },

  joinDate: {
    element: document.getElementById("joinDate"),
    error: document.querySelector(".joinDate"),
    errorMessage: "براۓ مہربانی تاریخ درج کریں ",
  },

  Salary1: {
    element: document.getElementById("Salary1"),
    error: document.querySelector(".Salary1"),
    errorMessage: "براۓ مہربانی تنخواہ درج کریں ",
  },

  OtherNum: {
    element: document.getElementById("OtherNum"),
    error: document.querySelector(".OtherNum"),
    errorMessage: "براۓ مہربانی فون نمبر درج کریں ",
  },

  Email: {
    element: document.getElementById("Email"),
    error: document.querySelector(".Email"),
    minLength: 3,
    errorMessage: "براۓ مہربانی ای میل درج کریں اور 3 حروف سے زیادہ ہونا چاہئے",
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
