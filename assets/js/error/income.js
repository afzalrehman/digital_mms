const form = document.getElementById("income");

const myConstants = {
  rigisterNumber: {
    element: document.getElementById("RegNumber"),
    error: document.querySelector(".RegNumber"),
    errorMessage: "براۓ مہربانی رجسٹر نمبر ایڈ کریں",
  },
  income_name: {
    element: document.getElementById("income_name"),
    error: document.querySelector(".income_name"),
    errorMessage: "براۓ مہربانی  نام ایڈ کریں",
  },
  incomeDate: {
    element: document.getElementById("incomeDate"),
    error: document.querySelector(".incomeDate"),
    errorMessage: "براۓ مہربانی تاریخ ایڈ کریں",
  },

  incomeMonth: {
    element: document.getElementById("incomeMonth"),
    error: document.querySelector(".incomeMonth"),
    errorMessage: "براۓ مہربانی مہینہ ایڈ کریں",
  },
  resiveName: {
    element: document.getElementById("resiveName"),
    error: document.querySelector(".resiveName"),
    errorMessage: "براۓ مہربانی  دینے والے کا نام ایڈ کریں",
  },
  income_amount: {
    element: document.getElementById("incomeAmount"),
    error: document.querySelector(".incomeAmount"),
    errorMessage: "براۓ مہربانی رقم ایڈ کریں",
  },

  mad_Name: {
    element: document.getElementById("mad_Name"),
    error: document.querySelector(".mad_Name"),
    errorMessage: "براۓ مہربانی مدرسہ درج کریں",
  },
  payment_method: {
    element: document.getElementById("payment_method"),
    error: document.querySelector(".payment_method"),
    errorMessage: "براۓ مہربانی درج کریں",
  },
  incomecategriy: {
    element: document.getElementById("incomecategriy"),
    error: document.querySelector(".incomecategriy"),
    errorMessage: "براۓ مہربانی درج کریں",
  },

  short_discription: {
    element: document.getElementById("short_discription"),
    error: document.querySelector(".short_discription"),
    errorMessage: "براۓ مہربانی مختصر وضاحت درج کریں",
  }

};

function validateInput(input) {
  const trimmedValue = input.element.value.trim();
  let isValid = true;

  if (trimmedValue === "") {
    input.error.textContent = input.errorMessage;
    input.element.classList.add("error-border");
    isValid = false;
  } 
  else if (input.pattern && !input.pattern.test(trimmedValue)) {
    input.error.textContent = input.errorMessage;
    input.element.classList.add("error-border");
    isValid = false;
  }
   else if (input.minLength && trimmedValue.length < input.minLength) {
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
