const { body } = require('express-validator')

const mhsValidate = [
  body('nim')
    .notEmpty().withMessage('Nim Harus Terisi')
    .escape()
    .trim(),
  body('nama')
    .notEmpty().withMessage('Nama Harus Terisi')
    .isString().withMessage('Nama harus string')  
    .escape()
    .trim(),
  body('stambuk')
    .notEmpty().withMessage('Stambuk Harus Terisi')
    .escape()
    .trim()
]

module.exports = mhsValidate