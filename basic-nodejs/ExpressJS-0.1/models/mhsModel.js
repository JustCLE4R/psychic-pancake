const con = require("../config/db");

var mhsModel = {
  get: (result) => {
    con.query("SELECT * FROM mahasiswa", (err, rows) => {
      if (err) {
        return result(err, null)
      } else {
        return result(null, rows)
      }
    })
  },

  create: (mhsBaru, result) => {
    con.query(`INSERT INTO mahasiswa SET ?`, mhsBaru, (err, rows) => {
        if (err) {
          return result(err, null)
        } else {
          return result(null, rows)
        }
      })
  },

  getByNIM: (nim, result) => {
    con.query(`SELECT * FROM mahasiswa WHERE nim = ?`, nim, (err, rows) => {
        if(err)
          return result(err)
        
        if(rows.length <= 0){
          return result(err)
        }
        else{
          return result(rows)
        }
      })
  },

  update: (nim, mhsUpdate, result) => {
    con.query(`UPDATE mahasiswa SET ? WHERE nim = ?`, [mhsUpdate, nim], (err, rows) => {
        if(err)
          return result(err)
        
        return result(rows)
      })
  },

  destroy: (nim, result) => {
    con.query(`DELETE FROM mahasiswa WHERE nim = ?`, nim, (err, rows) => {
        if(err)
          return result(err)
        
        return result(rows)
      })
  }
};

module.exports = mhsModel;
