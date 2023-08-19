const { validationResult } = require("express-validator");
const admin = require("../models/adminModel");
const bcrypt = require('bcrypt');
const adminModel = require("../models/adminModel");

const mhsController = {
  regis: async (req, res) => {
    try {
      const errors = validationResult(req)
      const errs = errors.array()
      let err_msg = []

      if(req.body.password !== req.body.password2){
        err_msg += 'Password tidak sama <br/>'
      }

      if(!errors.isEmpty() || req.body.password !== req.body.password2){
        errs.forEach((err) => {
          err_msg += err['msg'] +  '<br/>'
        })
        return [req.flash('error', err_msg), res.render('admin/register', {datas: req.body})]
      }
      
      const hashedPassword = await bcrypt.hash(req.body.password, 10)

      let adminBaru = {
        nama: req.body.nama,
        nim: req.body.nim,
        username: req.body.username,
        password: hashedPassword,
      }

      adminModel.regis(adminBaru, (err) => {
        if(err){
          req.flash('error', 'ada masalah saat menambahkan data ke database')

        } else{
          req.flash('success', 'Asisten Lab berhasil ditambahkan')
          res.redirect('/admin/login')
        }
      })
    } catch (error) {
      next(error)
    }
  }
}

module.exports = mhsController