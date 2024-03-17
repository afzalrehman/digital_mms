const form = document.getElementById("class_page");

const myConstants = {

Name: {
    element: document.getElementById("class"),
    error: document.querySelector(".class"),
    errorMessage: "براۓ مہربانی کلاس سلیکٹ کریں",
  },

  MadName: {
    element: document.getElementById("classdepartment"),
    error: document.querySelector(".classdepartment"),
    errorMessage: "براۓ مہربانی شعبہ ایڈ کریں",
  },

  madarsa: {
    element: document.getElementById("classMad"),
    error: document.querySelector(".classMad"),
    errorMessage: "براۓ مہربانی مدرسہ ایڈ کریں",
  },
  // section: {
  //   element: document.getElementById("section_Data1"),
  //   error: document.querySelector(".section_Data"),
  //   errorMessage: "براۓ مہربانی شعبہ ایڈ کریں",
  // },
  
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
    if (key === "Name") {
      this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    }
    validateForm();
  });
}

