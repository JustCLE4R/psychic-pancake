const express = require('express')
const app = express();
const passport = require("passport");
const flash = require("express-flash");
const session = require("express-session");
const cookieParser = require('cookie-parser');
const methodOverride = require("method-override");


const { loginCheck } = require("./config/passport-config");
loginCheck(passport);


//mendefinisikan pemakaian ejs untuk view engine
app.set("view engine", "ejs");

//use the things
app.use(express.static("public")); //biar bisa akses folder public
app.use(express.urlencoded({ extended: true })); //biar bisa akses informasi dari form
app.use(methodOverride("_method"));
// app.use(cookieParser());
app.use(express.json());
app.use(flash());
app.use(
  session({
    resave: false,
    saveUninitialized: false,
    secret: "kepala bapak kau",
    cookie: { secure: false, maxAge: 12 * 60 * 60 * 1000 }, //h m s ms, jadi 12 jam
  })
);
app.use(passport.authenticate('session'));
// app.use(passport.initialize());
// app.use(passport.session());

//include router
const mhsRouter = require("./routes/mhsRouter");
const adminRouter = require("./routes/adminRouter");

//routing
app.use("/mahasiswa", mhsRouter);
app.use("/admin", adminRouter);

//root route
app.get("/", passport.checkAuthentication, (req, res) => {
  res.render("index", {nama: req.user.nama});
});

app.listen(3000, () => {
  console.log('server up and running on port 3000')
})