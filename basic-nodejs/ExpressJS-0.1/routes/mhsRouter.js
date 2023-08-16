const express = require('express')
const router = express.Router()
const mhsController = require('../controllers/mhsController')
const mhsValidate = require('../validations/mhsValidation')

router 
  .route('/')
  .get(mhsController.index)
//   .post(mhsController.store)

router
  .route('/tambah')
  .get(mhsController.add)
  .post(mhsValidate, mhsController.save)

router
  .route('/ubah/:nim')
  .get(mhsController.edit)
  .post(mhsValidate, mhsController.update)

// router
//   .route('/:nim')
//   .put(mhsController.update)
//   .delete(mhsController.destroy)

// router
//   .route('/:nim/edit')
//   .get(mhsController.edit)

module.exports = router