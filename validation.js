// Function to validate login form
function validateLogin() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    if (email === "" || password === "") {
        alert("Both email and password are required for login.");
        return false;
    }

    // Simple email format validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Password length validation
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    // Check login details
    if (email === "chandudasari2004@gmail.com" && password === "Chandudasari@123") {
        alert("Login successful");
    } else {
        alert("Incorrect email or password.");
        return false;
    }

    return true;
}

// Function to validate registration form
function validateRegister() {
    const firstName = document.getElementById('register-firstname').value;
    const lastName = document.getElementById('register-lastname').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const confirmPassword = document.getElementById('register-confirmpassword').value;
    const terms = document.getElementById('register-terms').checked;

    if (firstName === "" || lastName === "" || email === "" || password === "" || confirmPassword === "") {
        alert("All fields are required for registration.");
        return false;
    }

    // Simple email format validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Password length validation
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    // Confirm password validation
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Terms and conditions validation
    if (!terms) {
        alert("You must agree to the terms and conditions.");
        return false;
    }

    alert("Registration successful");
    return true;
}

// Attach validation functions to forms
document.getElementById('login').onsubmit = function() {
    return validateLogin();
};

document.getElementById('register').onsubmit = function() {
    return validateRegister();
};
