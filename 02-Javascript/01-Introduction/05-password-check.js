const numbers = '0123456789',
  lower_case = 'abcdefghijklmnopqrstuvwxyz',
  upper_case = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
  special_characters = '!@#$%^&*()-+';

const regex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+]).+$/;
const hasLower = /[a-z]/.test(password);

if (!hasLower) results++;

function checkPassword(password) {
  const lengthPassword = password.length;
  const errors = [];
  if (lengthPassword < 6) {
    errors.push();
  }
}

function minimumNumber(n, password) {
  const hasDigit = /\d/.test(password);
  const hasLower = /[a-z]/.test(password);
  const hasUpper = /[A-Z]/.test(password);
  const hasSpecial = /[!@#$%^&*()\-\+]/.test(password);
  let missingTypes = 0;
  if (!hasDigit) missingTypes++;
  if (!hasLower) missingTypes++;
  if (!hasUpper) missingTypes++;
  if (!hasSpecial) missingTypes++;
  const minLength = 6;
  const lengthRequirement = Math.max(0, minLength - n);
  return Math.max(missingTypes, lengthRequirement);
}
