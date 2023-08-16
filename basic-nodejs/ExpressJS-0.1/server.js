const express = require('express')
const app = express()
// const con = require('./config/db.js')
const bodyParser = require('body-parser')
const flash = require('express-flash')
const session = require('express-session')
const expressValidator = require('express-validator')
var methodOverride = require('method-override')

//mendefinisikan pemakaian ejs untuk view engine
app.set('view engine', 'ejs')

//connection route to database
// app.use((req, res, next) => {
//   req.con = con
//   next()
// })

//parsing body request
app.use(express.static('public')) //biar bisa akses folder public
app.use(express.urlencoded({extended: true})) //biar bisa akses informasi dari form
app.use(express.json())
app.use(bodyParser.urlencoded({extended: true}))
app.use(bodyParser.json())
app.use(
  session({
    resave: true,
    saveUninitialized: true,
    secret:"yash is a super star",
    cookie: { secure: false, maxAge: 14400000 },
  })
);
app.use(flash())
app.use(methodOverride('_method'))

//include router
const mhsRouter = require('./routes/mhsRouter')

//routing
app.use('/mahasiswa', mhsRouter)

app.listen(3000, () => {
  console.log('server up and running on port 3000')
})