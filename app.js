//IMPORTS
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var chalk = require('chalk');
var zmq = require('zeromq')
  , sock = zmq.socket('pub');

sock.bindSync('tcp://127.0.0.1:7002');
console.log('Publisher bound to port 7002');

// CONSTANST
const CHANNEL_NAME = 'test-channel';
const SOCKET_IO_PORT = 3000;

// PROCESS
var redis = new Redis();

redis.subscribe(CHANNEL_NAME, function(err, count) {

});

redis.on('message', function(channel, message) {
    console.log(chalk.blue('Message Recieved: '+message));
    message = JSON.parse(message);
    console.log(chalk.red('Message 2 Recieved: '+JSON.stringify(message.data.data)));
    io.emit(channel + ':' + message.event, message.data);
    sock.send(['ADA', message.data.data]);
});

http.listen(3000, function(){
	console.log(chalk.green('Listening on Port '+SOCKET_IO_PORT));
});

