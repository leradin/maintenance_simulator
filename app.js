//IMPORTS
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var chalk = require('chalk');
var zmq = require('zeromq')
  , sockConfig = zmq.socket('pub')
  , sockRequest = zmq.socket('pub');

sockConfig.bindSync('tcp://*:7002');
sockRequest.bindSync('tcp://*:7003');

console.log('Publisher bound to port 7002');
console.log('Publisher bound to port 7003');

// CONSTANST
const CHANNEL_NAME = 'test-channel';
const CHANEL_NAME_REQUEST = 'request_event';
const SOCKET_IO_PORT = 3000;

// PROCESS
var redis = new Redis();

redis.subscribe([CHANNEL_NAME,CHANEL_NAME_REQUEST], function(err, count) {

});

redis.on('message', function(channel, message) {
    console.log(chalk.blue('Channel source'+channel+' Message Recieved: '+message));
    var modifyMessage = JSON.parse(message);

   
    //io.emit(channel + ':' + message.event, message.data);
    if(channel === CHANNEL_NAME){
		sockConfig.send(['ADA', JSON.stringify(modifyMessage.data.data[0])]);
		console.log(chalk.red('Message 2 Recieved: '+JSON.stringify(modifyMessage.data.data[0])));
    }else if(channel === CHANEL_NAME_REQUEST){
        try{
            modifyMessage.data.data[0].active = JSON.parse(modifyMessage.data.data[0].active);
            sockRequest.send(['SET_ACTIVE', JSON.stringify(modifyMessage.data.data[0])]);
            console.log(chalk.red(JSON.stringify(modifyMessage.data.data[0])));
        }catch(err){
            //modifyMessage.data.data[0].portNumber = JSON.parse(modifyMessage.data.data[0].portNumber);
            sockRequest.send([modifyMessage.data.data[0].topic, JSON.stringify(modifyMessage.data.data[0])]);
            //sockRequest.send(['EDIT_CONFIG_FILES',JSON.stringify(modifyMessage.data.data[0])]);
            console.log(chalk.red(JSON.stringify(modifyMessage.data.data[0])));
        }
    }
    
});

http.listen(3000, function(){
	console.log(chalk.green('Listening on Port '+SOCKET_IO_PORT));
});


