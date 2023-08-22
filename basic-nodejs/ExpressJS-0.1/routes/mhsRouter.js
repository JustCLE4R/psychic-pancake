const express = require('express')
const router = express.Router()
const passport = require('passport');
const mhsController = require('../controllers/mhsController')
const mhsValidate = require('../validations/mhsValidation')

router.route("/").get(passport.checkAuthentication ,mhsController.index);

router
  .route("/tambah")
  .get(passport.checkAuthentication, mhsController.add)
  .post(passport.checkAuthentication, mhsValidate, mhsController.save);

router
  .route("/ubah/:nim")
  .get(passport.checkAuthentication, mhsController.edit)
  .post(mhsValidate, mhsController.update);

router.use((req, res, next) => {
  if (req.query._method == "DELETE") {
    req.method = "DELETE";
    req.url = req.path;
  }
  next();
});

router.delete("/:nim", passport.checkAuthentication, mhsController.destroy);

module.exports = router