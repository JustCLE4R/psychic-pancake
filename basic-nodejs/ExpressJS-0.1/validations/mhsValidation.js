const { body } = require('express-validator')

const mhsValidate = [
  body("nim")
    .notEmpty()
    .withMessage("Nim Harus Terisi")
    .isString()
    .withMessage("harus string ya dek")
    .escape()
    .trim(),
  body("nama")
    .notEmpty()
    .withMessage("Nama Harus Terisi")
    .isString()
    .withMessage("Nama harus string")
    .escape()
    .trim(),
  body("stambuk")
    .notEmpty()
    .withMessage("Stambuk Harus Terisi")
    .escape()
    .trim(),
];

module.exports = mhsValidate