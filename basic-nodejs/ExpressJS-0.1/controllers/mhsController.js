const { validationResult } = require("express-validator");
const mhsModel = require("../models/mhsModel");

const mhsController = {
  index: (req, res) => {
    mhsModel.get((err, datas) => {
      if (err) {
        throw err;
      } else {
        res.render("mahasiswa/index", { datas: datas });
      }
    });
  },

  add: (req, res) => {
    res.render("mahasiswa/tambah");
  },

  save: (req, res, next) => {
    try {
      const errors = validationResult(req);
      const err = errors.array();
      let err_msg = [];

      if (!errors.isEmpty()) {
        err.forEach((err_satuan) => {
          err_msg += err_satuan["msg"] + "<br/>";
        });
        return [req.flash("error", err_msg), res.redirect("/mahasiswa/tambah")];
      }

      var mhsBaru = {
        nim: req.body.nim,
        nama: req.body.nama,
        stambuk: req.body.stambuk,
      };

      mhsModel.create(mhsBaru, (err) => {
        if (err) {
          req.flash("error", "There was error in inserting data");
        } else {
          req.flash("success", "Mahasiswa added succesfully");
        }
        res.redirect("/mahasiswa");
      });
    } catch (err) {
      next(err);
    }
  },

  edit: (req, res) => {
    var nim = req.params.nim;
    mhsModel.getByNIM(nim, (result) => {
      if (result == null) {
        req.flash("error", "maaf, mahasiswa yang kamu cari tidak ada!!");
        res.redirect("/mahasiswa");
      } else {
        res.render("mahasiswa/ubah", { datas: result });
      }
    });
  },

  update: (req, res) => {
    var nim = req.params.nim;
    try {
      const errors = validationResult(req);
      const err = errors.array();
      let err_msg = [];

      if (!errors.isEmpty()) {
        err.forEach((err_satuan) => {
          err_msg += err_satuan["msg"] + "<br/>";
        });
        return [req.flash("error", err_msg), res.redirect("/mahasiswa/tambah")];
      }

      var mhsUpdate = {
        nim: req.body.nim,
        nama: req.body.nama,
        stambuk: parseInt(req.body.stambuk),
      };

      mhsModel.update(nim, mhsUpdate, (result) => {
        if (result.affectedRows == 1) {
          req.flash("success", "Mahasiswa Update succesfully");
          res.redirect("/mahasiswa");
        } else {
          req.flash("error", "There was error in inserting data");
          res.redirect("/mahasiswa/ubah/" + nim);
        }
      });
    } catch (err) {
      next(err);
    }
  },

  destroy: (req, res) => {
    var nim = req.params.nim;
    mhsModel.destroy(nim, (result) => {
      if (result.affectedRows == 1) {
        req.flash("success", "Mahasiswa ter delete");
        res.redirect("/mahasiswa");
      } else {
        req.flash("error", "Mahasiswa gagal ter delete");
        res.redirect("/mahasiswa");
      }
    });
  },
};

module.exports = mhsController;
