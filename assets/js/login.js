const container = document.getElementById('login-container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});


// form validation

document.getElementById('registerForm').addEventListener('submit', (event) => {
    event.preventDefault();
    const name = document.getElementById('registerName').value.trim();
    const email = document.getElementById('registerEmail').value.trim();
    const password = document.getElementById('registerPassword').value.trim();

    let valid = true;

    if (name=="") {
        valid = false;
        displayError('registerName', 'Name is required');
    } 
    else{
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            displayError('registerName', 'Please enter a valid name');
        }
       else {
        clearError('registerName');
       }
 
    }
    
    if (email=="") {
        valid = false;
        displayError('registerEmail', 'Email is required');
    
    } 
    
    else {
         var regex = /^[a-zA-Z]+[0-9]+@gmail\.com$/;
        if (regex.test(email) === false) {
            displayError('registerEmail', 'Invalid email format');
        } 

        else {
            clearError('registerEmail');
        }
    }

    if (!password) {
        valid = false;
        displayError('registerPassword', 'Password is required');
    } else {
        clearError('registerPassword');
    }

    if (valid) {
        alert('Registration Successful');
    }
});

function displayError(elementId, message) {
    let errorElement = document.getElementById(elementId + 'Error');
    if (!errorElement) {
        errorElement = document.createElement('p');
        errorElement.id = elementId + 'Error';
        errorElement.className = 'error';
        document.getElementById(elementId).parentNode.insertBefore(errorElement, document.getElementById(elementId).nextSibling);
    }
    errorElement.textContent = message;
}

function clearError(elementId) {
    const errorElement = document.getElementById(elementId + 'Error');
    if (errorElement) {
        errorElement.parentNode.removeChild(errorElement);
    }
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
