const con = require("../config/db");

var adminModel = {
  regis: (adminBaru, result) => {
    con.query(`INSERT INTO aslab SET ?`, adminBaru, (err, res) => {
      if (err) {
        return result(err, null)
      } else {
        return result(null, res)
      }
    })
  },

  getByUsername: (username, result) => {
    con.query(`
      SELECT * FROM (
        SELECT id, 'aslab' role, nama, username, password
        FROM aslab 
        UNION
        SELECT id, 'laboran', nama, username, password
        FROM laboran
        UNION
        SELECT id, 'dosen', nama, username, password
        FROM dosen
      ) user
      WHERE user.username = ?
    `, username, (err, res) => {
      if(err)
      return result(err)

      if(res.length <= 0){
      return result(err)
      }
      else{
        return result(res)
      }
    })
  }
};

module.exports = adminModel;