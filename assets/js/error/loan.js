const form = document.getElementById("loan");

const myConstants = {
  recipient_name: {
    element: document.getElementById("recipient_name"),
    error: document.querySelector(".recipient_name"),
    errorMessage: "براۓ مہربانی رسیددار کا نام ایڈ کریں",
  },
  registration_number: {
    element: document.getElementById("registration_number"),
    error: document.querySelector(".registration_number"),
    errorMessage: "براۓ مہربانی رجسٹریشن نمبر ایڈ کریں",
  },
  loan_amount: {
    element: document.getElementById("loan_amount"),
    error: document.querySelector(".loan_amount"),
    errorMessage: "براۓ مہربانی قرض کی رقم ایڈ کریں",
  },
  loan_date: {
    element: document.getElementById("loan_date"),
    error: document.querySelector(".loan_date"),
    errorMessage: "براۓ مہربانی قرض کی تاریخ ایڈ کریں",
  },
  interest_rate: {
    element: document.getElementById("interest_rate"),
    error: document.querySelector(".interest_rate"),
    errorMessage: "براۓ مہربانی فائدہ کی شرح ایڈ کریں",
  },
  loan_duration: {
    element: document.getElementById("loan_duration"),
    error: document.querySelector(".loan_duration"),
    errorMessage: "براۓ مہربانی قرض کی مدت ایڈ کریں",
  },
  payment_method: {
    element: document.getElementById("payment_method"),
    error: document.querySelector(".payment_method"),
    errorMessage: "براۓ مہربانی ادائیگی کا طریقہ ایڈ کریں",
  },
  purpose: {
    element: document.getElementById("purpose"),
    error: document.querySelector(".purpose"),
    errorMessage: "براۓ مہربانی قرض کی مقصد ایڈ کریں",
  },
  remarks: {
    element: document.getElementById("remarks"),
    error: document.querySelector(".remarks"),
    errorMessage: "براۓ مہربانی تبصرہ ایڈ کریں",
  },
  mad_Name: {
    element: document.getElementById("mad_Name"),
    error: document.querySelector(".mad_Name"),
    errorMessage: "براۓ مہربانی مدرسہ سلیکٹ کریں",
  },
  agreement: {
    element: document.getElementById("agreement"),
    error: document.querySelector(".agreement"),
    errorMessage: "براۓ مہربانی معاہدہ ایڈ کریں",
  }
};

function validateInput(input) {
  const trimmedValue = input.element.value.trim();
  let isValid = true;

  if (trimmedValue === "") {
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
    validateForm();
  });
}
