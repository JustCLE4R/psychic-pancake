const { validationResult, body } = require("express-validator");
const mhs = require("../models/mhs");
const { json } = require("body-parser");

const mhsController = {
  index: (req, res) => {
    mhs.get((err, datas) => {
      if(err){
        throw err
      }
      else{
        res.render("mahasiswa/index", { datas: datas })
      }
    })
  },

  add: (req, res) => {
    res.render('mahasiswa/tambah')
  },

  save: (req, res, next) => {
    try {
      const errors = validationResult(req)
      // const err = new Error(JSON.stringify(errors.array()))
      const err = errors.array()
      let err_msg=[];

      if(!errors.isEmpty()){
        err.forEach((err_satuan)=>{
          err_msg += err_satuan['msg'] + "<br/>"
        })
        console.log(err_msg)
        return res.status(400).render('mahasiswa/tambah', {
          success: false,
          errors: err_msg
        })
      }

      var mhsBaru = {
        nim: req.body.nim,
        nama: req.body.nama,
        stambuk: req.body.stambuk
      }

      mhs.create(mhsBaru, (err) => {
        if (err) {
          req.flash("error", "There was error in inserting data")
        } else {
          req.flash("success", "Mahasiswa added succesfully")
        }
        res.redirect('/mahasiswa')
      })

    }
    catch (err) {
      next(err)
    }
  },

  edit: (req, res) => {
    var nim = req.params.nim
    mhs.getByNIM(nim, (result) => {
      if(result == null){
        req.flash('error', 'maaf, mahasiswa yang kamu cari tidak ada!!')
        res.redirect('/mahasiswa')
      }
      else{
        res.render('mahasiswa/ubah', {datas: result})
      }
    })
  },

  update: (req, res) => {
    var nim = req.params.nim
    try {
      const errors = validationResult(req)
      const err = errors.array()

      if(!errors.isEmpty()){
        return res.status(400).render('mahasiswa/tambah', {
          success: false,
          errors: err
        })
      }

      var mhsUpdate = {
        nim: req.body.nim,
        nama: req.body.nama,
        stambuk: parseInt(req.body.stambuk) 
      }

      mhs.update(nim, mhsUpdate, (result) => {
        if (result.affectedRows==1) {
          
          req.flash("success", "Mahasiswa added succesfully")
          res.redirect('/mahasiswa')
        } else {
          req.flash("error", "There was error in inserting data")
          res.redirect('/mahasiswa/ubah/'+nim)
        }
        
      })

    }
    catch (err) {
      next(err)
    }
  }

  // store: (req, res) => {
  //   mhs.create(req.con, req.body, (err) => {
  //     res.redirect('/mahasiswa')
  //   })
  // },

  // edit: (req, res) => {
  //   mhs.getById(req.con, req.params.id, (err, rows) => {
  //     res.render('mahasiswa/edit', {data: rows[0]})
  //   })
  // },

  // update: (req, res) => {
  //   mhs.update(req.con, req.body, req.params.id, (err) => {
  //     res.redirect('mahasiswa')
  //   })
  // },

  // destroy: (req, res) => {
  //   mhs.destroy(req.con, req.params.id, (err) => {
  //     res.redirect('/mahasiswa')
  //   })
  // }
}

module.exports = mhsController
