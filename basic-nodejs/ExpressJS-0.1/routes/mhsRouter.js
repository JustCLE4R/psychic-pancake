const express = require('express')
const router = express.Router()
const mhsController = require('../controllers/mhsController')
const mhsValidate = require('../validations/mhsValidation')

router.route("/").get(mhsController.index);

router
  .route("/tambah")
  .get(mhsController.add)
  .post(mhsValidate, mhsController.save);

router
  .route("/ubah/:nim")
  .get(mhsController.edit)
  .post(mhsValidate, mhsController.update);

router.use((req, res, next) => {
  if (req.query._method == "DELETE") {
    req.method = "DELETE";
    req.url = req.path;
  }
  next();
});

router.delete("/:nim", mhsController.destroy);

module.exports = router