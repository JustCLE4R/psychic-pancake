const express = require("express");
const router = express.Router();
const passport = require("passport");
const adminController = require('../controllers/adminController')
const adminValidate = require('../validations/adminValidation')

router
  .route("/login")
  .get(passport.notAuthenticated, adminController.loginView)
  .post(passport.authenticate('local', {
    successRedirect: '/',
    failureRedirect: '/admin/login',
    failureFlash: true
  }))

// router
//   .route('/admin')
//   .get(passport.setAuthenticatedUser, (req, res) => {
//     res.send('admin/admin')
//   })

router
  .route("/register")
  .get(passport.notAuthenticated, adminController.regisView)
  .post(adminValidate, adminController.regis);

module.exports = router;
