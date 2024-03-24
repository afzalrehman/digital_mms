const form = document.getElementById("expance");

const myConstants = {
  rigisterNumber: {
    element: document.getElementById("RegNumber"),
    error: document.querySelector(".RegNumber"),
    errorMessage: "براۓ مہربانی رجسٹر نمبر ایڈ کریں",
  },
  expance_name: {
    element: document.getElementById("expance_name"),
    error: document.querySelector(".expance_name"),
    errorMessage: "براۓ مہربانی  نام ایڈ کریں",
  },
  expanceـdate: {
    element: document.getElementById("expanceـdate"),
    error: document.querySelector(".expanceـdate"),
    errorMessage: "براۓ مہربانی تاریخ ایڈ کریں",
  },
  expance_month: {
    element: document.getElementById("expance_month"),
    error: document.querySelector(".expance_month"),
    errorMessage: "براۓ مہربانی مہینہ ایڈ کریں",
  },
  resiveName: {
    element: document.getElementById("resiveName"),
    error: document.querySelector(".resiveName"),
    errorMessage: "براۓ مہربانی  دینے والے کا نام ایڈ کریں",
  },
  expance_amount: {
    element: document.getElementById("expanceAmount"),
    error: document.querySelector(".expanceAmount"),
    errorMessage: "براۓ مہربانی رقم ایڈ کریں",
  },

  mad_Name: {
    element: document.getElementById("mad_Name"),
    error: document.querySelector(".mad_Name"),
    errorMessage: "براۓ مہربانی مدرسہ درج کریں",
  },
  pay_now: {
    element: document.getElementById("pay_now"),
    error: document.querySelector(".pay_now"),
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
