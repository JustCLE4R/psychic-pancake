const { validationResult } = require("express-validator");
const adminModel = require("../models/adminModel");
const bcrypt = require('bcrypt');
// const passport = require('passport');
// const initializePassport = require('../config/passport-config');

// initializePassport(passport, username => adminModel.getByUsername(username));


const mhsController = {
  loginView: (req, res) => {
      res.render("admin/login");
    },

  login: (req, res) => {

  },

  regisView: (req, res) => {
    res.render("admin/register");
  },
  
  regis: async (req, res) => {
    try {
      const errors = validationResult(req);
      const errs = errors.array();
      let err_msg = [];
      
      if (req.body.password !== req.body.password2) {
        err_msg += "Password tidak sama <br/>";
      }

      if (!errors.isEmpty() || req.body.password !== req.body.password2) {
        errs.forEach((err) => {
          err_msg += err["msg"] + "<br/>";
        });
        return [
          req.flash("error", err_msg),
          res.render("admin/register", { datas: req.body }),
        ];
      }
      
      const hashedPassword = await bcrypt.hash(req.body.password, 15);
      
      let adminBaru = {
        nama: req.body.nama,
        nim: req.body.nim,
        username: req.body.username,
        password: hashedPassword,
      };
      
      adminModel.regis(adminBaru, (err) => {
        if (err) {
          req.flash("error", "ada masalah saat menambahkan data ke database");
        } else {
          req.flash("success", "Asisten Lab berhasil ditambahkan");
          res.redirect("/admin/login");
        }
      });
    } catch (error) {
      next(error);
    }
  },

  // getByUsername: (req, res) => {
  //   let username = req.params.username
  //   adminModel.getByUsername(username, (result) => {
  //     if (result == null) {
  //       res.send("maaf, Admin yang kamu cari tidak ada!!");
  //     } else {
  //       res.send( {datas: result} );
  //     }
  //   })
  // },
};

module.exports = mhsController