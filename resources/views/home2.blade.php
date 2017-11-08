@extends('layouts.app')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <script>
        var socket = io('http://'+'{{ env('SOCKET_IO_IP_ADDRESS') }}'+':'+'{{ env('SOCKET_IO_PORT') }}');
        //var socket = io('http://192.168.10.10:3000');
        socket.on(""+'{{ env('CHANEL_NAME') }}'+":App\\Events\\EventName", function(message){
            // increase the power everytime we load test route
            $('#power').text(message.data.power);
        });
    </script>
@stop