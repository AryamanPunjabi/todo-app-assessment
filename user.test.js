// user.test.js
const { validateUsername, validatePassword } = require('./user');  // Ensure this path is correct

describe('Username Validation', () => {
    test('validates correct username format', () => {
        expect(validateUsername('validUser1')).toBe(true);
    });

    test('validates username with special characters', () => {
        expect(validateUsername('invalid@user!')).toBe(false);
    });

    test('validates empty username', () => {
        expect(validateUsername('')).toBe(false);
    });

    test('validates username with spaces', () => {
        expect(validateUsername('invalid user')).toBe(false);
    });

    test('validates username with too short length', () => {
        expect(validateUsername('usr')).toBe(false);  // assuming minimum length is 4
    });
});

describe('Password Validation', () => {
    test('validates correct password format', () => {
        expect(validatePassword('Password123')).toBe(true);
    });

    test('validates password with too short length', () => {
        expect(validatePassword('Pass')).toBe(false);  // assuming minimum length is 8
    });

    test('validates password without numbers', () => {
        expect(validatePassword('Password')).toBe(false);  // assuming number is required
    });

    test('validates password without uppercase letters', () => {
        expect(validatePassword('password123')).toBe(false);  // assuming uppercase letter is required
    });

    test('validates password with no lowercase letters', () => {
        expect(validatePassword('PASSWORD123')).toBe(false);  // assuming lowercase is required
    });

    test('validates password with spaces', () => {
        expect(validatePassword('Password 123')).toBe(false);  // assuming no spaces allowed
    });
});
