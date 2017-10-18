<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
    <![endif]-->        
    
    <title>.::CESISCCAM::.</title>
    
    <link href="{{ mix('css/app.css')}}" rel="stylesheet" type="text/css" />
    <!--[if lt IE 10]>
        <link href="css/ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->       
    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <script src="{{ mix('js/app.js')}}"></script>
    
</head>
<body>    

    <div class="header">
        @include('layouts.header')
    </div>

    <div class="navigation">
        @include('layouts.menu')
    </div>

    <div class="content">
        @yield('content')
    </div> 

</body>
</html>
