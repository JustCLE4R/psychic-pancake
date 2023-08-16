const express = require("express")
const app = express()
app.use(express.static("public"));

app.set('view engine', 'ejs')

app.get('/', (req, res) => {
    res.render('index')
})

app.get('/login', (req, res) => {
    res.render('login');
})

app.get('/register', (req, res) => {
    res.render('register');
})

app.get('*/*', (req, res) => {
    res.render('404');
})


const userRouter = require('./routes/users')
app.use('/users', userRouter)

app.listen(3000);