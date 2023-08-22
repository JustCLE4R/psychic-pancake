const localStrategy = require('passport-local').Strategy
const bcrypt = require('bcrypt')
const passport = require('passport');
const adminModel = require("../models/adminModel");

const loginCheck = passport => {
  const authenticateUser = (username, password, done) => {
    adminModel.getByUsername(username, async(rows) => {
      if (rows == null) {
        return done(null, false, {
          message: "ndak ada usernya, daftar dulu kau tu",
        });
      }
      let user = rows[0];
      try {
        if (await bcrypt.compare(password, user.password)) {
          return done(null, user);
        } else {
          return done(null, false, { message: "Password Salah" });
        }
      } catch (error) {
        return done(error);
      }
    });
  };

  passport.use(new localStrategy({}, authenticateUser));

  // serializing user to dedide which key is to be kept in cookies
  passport.serializeUser((user, done) => {
    done(null, { id: user.id, role: user.role, nama:user.nama, username: user.username });
  });

  // desearilizing the user from the key in the cookies
  passport.deserializeUser((user, done) => {
  //   let username = user['username'];
  //   adminModel.getByUsername(username, (result) => {
  //   if (result == null) {
  //       return done(null, false, {
  //         message: "ndak ada usernya, daftar dulu kau tu",
  //       });
  //     }
  //   let usernameToDeserialize = result[0]['username']
  // });
    return done(null, user);
  });

  //check if user authenticated
  passport.checkAuthentication = function (req, res, next) {
    if (req.isAuthenticated()) {
      return next();
    }
    return res.redirect("/admin/login");
  };

  //check if user is not Authenticated
  passport.notAuthenticated = function (req, res, next) {
    if (!req.isAuthenticated()) {
      return next();
    }
    return res.redirect("/");
  };

  //to set user for the views
  passport.setAuthenticatedUser = function (req, res, next) {
    if (req.isAuthenticated()) {
      res.locals.user = req.user;
    }
    next();
  };
};


module.exports = { loginCheck, }