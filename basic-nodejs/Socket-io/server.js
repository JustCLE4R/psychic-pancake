const express = require('express');
const http = require('http');
const socketio = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketio(server);

app.set('view engine', 'ejs');

app.use(express.static('public'));


io.on('connection', (socket) => {
  console.log('Connection established');
  socket.on('disconnect', () => {
    console.log('Connection closed');
  })
})



app.get('/', (req, res) => {
  res.render('index');
})

app.get('/queue', (req, res) => {
  res.render('queue');
});


server.listen(3000, () => {
  console.log("Server listening on port 3000")
});