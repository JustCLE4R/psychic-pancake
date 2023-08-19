const express = require("express");
const router = express.Router();
const adminController = require('../controllers/adminController')
const adminValidate = require('../validations/adminValidation')

router
  .route('/login')
  .get((req, res) => {
    res.render('admin/login')
  })

router
  .route('/register')
  .get((req, res) => {
    res.render('admin/register')
  })
  .post(adminValidate, adminController.regis)

module.exports = router;
