const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


// form validation login






// -----------------------------------------------------


const form_reg = document.getElementById('form_reg');
const useremail = document.getElementById('useremail');
const userpassword = document.getElementById('userpassword');
const username = document.getElementById('username');
const comfirmpass = document.getElementById('comfirmpass');
const useraddress = document.getElementById('useraddress');
const usermobile = document.getElementById('usermobile');

form_reg.addEventListener('submit', e => {
  const isValid = validateInputs();
  if (!isValid) {
    e.preventDefault(); // Prevent form submission if validation fails
  }
});

const msgError = (element, message) => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');

  errorDisplay.innerText = message;
  inputControl.classList.add('error');
  inputControl.classList.remove('success');
}

const isValidEmail = email => {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

const isValidUsername = username => {
  const un = /^[a-zA-Z\s]+$/;
  return un.test(String(username).toLowerCase());
}

const msgSuccess = element => {
  const inputControl = element.parentElement;
  const errorDisplay = inputControl.querySelector('.error');

  errorDisplay.innerText = '';
  inputControl.classList.add('success');
  inputControl.classList.remove('error');
}

const validateInputs = () => {
  let isValid = true;

  const useremailValue = useremail.value.trim();
  const userpasswordValue = userpassword.value.trim();
  const usernameValue = username.value.trim();
  const usercompassValue = comfirmpass.value.trim();
  const useraddressValue = useraddress.value.trim();
  const usermobileValue = usermobile.value.trim();

  // ---------username validation----------------
  if (usernameValue === '') {
    msgError(username, 'User Name is required**');
    isValid = false;
  } else if (!isValidUsername(usernameValue)) {
    msgError(username, 'Provide a valid user name');
    isValid = false;
  } else if (!isNaN(usernameValue[0])) {
    msgError(username, 'Username cannot start with a number');
    isValid = false;
  } else {
    msgSuccess(username);
  }

  // -----------email validation -------------------
  if (useremailValue === '') {
    msgError(useremail, 'User Email is required**');
    isValid = false;
  } else if (!isValidEmail(useremailValue)) {
    msgError(useremail, 'Provide a valid email address');
    isValid = false;
  } else {
    msgSuccess(useremail);
  }

  // ---------------password validation -------------------
  if (userpasswordValue === '') {
    msgError(userpassword, 'User password is required**');
    isValid = false;
  } else if (userpasswordValue.length < 8) {
    msgError(userpassword, 'Password must be at least 8 characters.');
    isValid = false;
  } else {
    msgSuccess(userpassword);
  }

  // ------------confirm password validation--------------
  if (usercompassValue === '') {
    msgError(comfirmpass, 'User confirm password is required**');
    isValid = false;
  } else if (usercompassValue.length < 8) {
    msgError(comfirmpass, 'Password must be at least 8 characters.');
    isValid = false;
  } else if (usercompassValue !== userpasswordValue) {
    msgError(comfirmpass, 'Passwords do not match');
    isValid = false;
  } else {
    msgSuccess(comfirmpass);
  }

  // ------------address validation---------------------
  if (useraddressValue === '') {
    msgError(useraddress, 'Address is required**');
    isValid = false;
  } else if (/^\d+$/.test(useraddressValue)) {
    msgError(useraddress, 'Address cannot be only numbers.');
    isValid = false;
  } else {
    msgSuccess(useraddress);
  }

  // -----------mobile validation --------
  if (usermobileValue === '') {
    msgError(usermobile, 'Mobile is required');
    isValid = false;
  } else if (!/^\d{1,10}$/.test(usermobileValue)) {
    msgError(usermobile, 'Phone number must be up to 10 digits long');
    isValid = false;
  } else {
    msgSuccess(usermobile);
  }

  return isValid;
};
