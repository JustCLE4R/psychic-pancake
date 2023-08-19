const express = require('express')
const app = express();
const bodyParser = require("body-parser");
const flash = require("express-flash");
const session = require("express-session");
const methodOverride = require("method-override");

//mendefinisikan pemakaian ejs untuk view engine
app.set("view engine", "ejs");

//parsing body request
app.use(express.static("public")); //biar bisa akses folder public
app.use(express.urlencoded({ extended: true })); //biar bisa akses informasi dari form
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(flash());
app.use(
  session({
    resave: true,
    saveUninitialized: true,
    secret: "kepala bapak kau",
    cookie: { secure: false, maxAge: 14400000 },
  })
);
app.use(methodOverride("_method"));

//include router
const mhsRouter = require("./routes/mhsRouter");
const adminRouter = require("./routes/adminRouter");

//routing
app.use("/mahasiswa", mhsRouter);
app.use("/admin", adminRouter);

//root route
app.get("/", (req, res) => {
  res.render("index");
});

app.listen(3000, () => {
  console.log('server up and running on port 3000')
})