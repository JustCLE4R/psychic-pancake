const { body } = require('express-validator')

const adminValidate = [
  body('nama')
    .notEmpty()
    .withMessage('Harus Diisi ya dek')
    .escape()
    .trim(),
  body('nim')
    .notEmpty()
    .withMessage('Harus Diisi yadeks')
    .isNumeric()
    .withMessage('isi NIM lah, nim kau ada hurufnya?')
    .escape()
    .trim(),
  body('username')
    .notEmpty()
    .withMessage('username harus ada ya')
    .escape()
    .trim(),
  body('password')
    .notEmpty()
    .withMessage('isilah password mu bambang')
    .isStrongPassword({
      minLength: 8,
      minLowercase: 1,
      minUppercase: 1,
      minNumbers: 1,
      minSymbols: 0,
      returnScore: false
    })
    .withMessage('Password Minimal 8, 1 Huruf Kecil, 1 Huruf Besar, 1 Angka')
    .escape()
    .trim(),
]

module.exports = adminValidate