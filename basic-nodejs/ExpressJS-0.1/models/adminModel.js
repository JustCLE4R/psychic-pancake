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
  }
};

module.exports = adminModel;