const con = require("../config/db");

var mhsModel = {
  get: (result) => {
    con.query("SELECT * FROM mahasiswa", (err, rows, fiels) => {
      if (err) {
        return result(err, null)
      } else {
        return result(null, rows)
      }
    })
  },

  create: (mhsBaru, result) => {
    con.query(
      `INSERT INTO mahasiswa SET ?`, mhsBaru, (err, res) => {
        if (err) {
          return result(err, null)
        } else {
          return result(null, res)
        }
      })
  },

  getByNIM: (nim, result) => {
    con.query(
      `SELECT * FROM mahasiswa WHERE nim = ?`, nim, (err, res) => {
        if(err)
          return result(err)
        
        if(res.length <= 0){
          return result(err)
        }
        else{
          return result(res)
        }
      })
  },

  update: (nim, mhsUpdate, result) => {
    con.query(
      `UPDATE mahasiswa SET ? WHERE nim = ?`, [mhsUpdate, nim], (err, res) => {
        if(err)
          return result(err)
        
        return result(res)
      })
  },

  destroy: (nim, result) => {
    con.query(
      `DELETE FROM mahasiswa WHERE nim = ?`, nim, (err, res) => {
        if(err)
          return result(err)
        
        return result(res)
      })
  }
};

module.exports = mhsModel;
