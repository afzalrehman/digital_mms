const form = document.getElementById("salary1");

const myConstants = {

  teacher_name: {
    element: document.getElementById("teacher_name"),
    error: document.querySelector(".teacher_name"),
    minLength: 3,
    errorMessage: "براۓ مہربانی نام درج کریں",
  },
  madarasa: {
    element: document.getElementById("madarasa"),
    error: document.querySelector(".madarasa"),
    errorMessage: "براۓ مہربانی  مدرسہ درج کریں",
  },
  basic_salary: {
    element: document.getElementById("basic_salary"),
    error: document.querySelector(".basic_salary"),
    errorMessage: "براۓ مہربانی درج کریں",
  },

  deductions: {
    element: document.getElementById("deductions"),
    error: document.querySelector(".deductions"),
    errorMessage: "براۓ مہربانی درج کریں",
  },
  salary_given: {
    element: document.getElementById("salary_given"),
    error: document.querySelector(".salary_given"),
    errorMessage: "براۓ مہربانی ادائیگی درج کریں",
  },
  salary_date: {
    element: document.getElementById("salary_date"),
    error: document.querySelector(".salary_date"),
    errorMessage: "براۓ مہربانی تاریخ درج کریں",
  },

  payment_method: {
    element: document.getElementById("payment_method"),
    error: document.querySelector(".payment_method"),
    errorMessage: " براۓ مہربانی سلیکٹ کریں",
  }
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
    if (key === "teacher_name") {
      this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    }
    validateForm();
  });
}
