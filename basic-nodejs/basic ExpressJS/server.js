const express = require("express")
const app = express()
app.use(express.static("public"));

app.set('view engine', 'ejs')

app.get('/', (req, res) =>{
    res.render('login')
})

const userRouter = require('./routes/users')
app.use('/users', userRouter)

app.listen(3000);