// user.js
function validateUsername(username) {
    // Your username validation logic
    const usernameRegex = /^[a-zA-Z0-9]{4,}$/; // Example rule: 4 or more characters, alphanumeric only
    return usernameRegex.test(username);
}

function validatePassword(password) {
    // Your password validation logic
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/; // Example: at least 8 characters, 1 uppercase, 1 number
    return passwordRegex.test(password);
}

module.exports = { validateUsername, validatePassword };  // Export both functions
