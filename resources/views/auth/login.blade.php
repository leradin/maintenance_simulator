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
        <a class="logo centralize"></a>
    </div>
    <div class="login" id="login">
    @include('layouts.message') 
        <div class="wrap">
            <h1>@lang('messages.app_name')</h1>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="validate">
                {{ csrf_field() }}
            <div class="row">
                <div class="input-group{{ $errors->has('enrollment') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="enrollment" name="enrollment" value="{{ old('enrollment') }}" placeholder="@lang('messages.enrollment')" class="form-control validate[required] text-input" data-prompt-position="topRight"/>
                </div> 

                 
                                                                
                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                    <input type="password" name="password" value="{{ old('password') }}"  placeholder="@lang('messages.password')" class="form-control validate[required] text-input" data-prompt-position="bottomRight"/>

                </div>
                 @if ($errors->has('enrollment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('enrollment') }}</strong>
                    </span>
                @endif       
                <div class="dr"><span></span></div>                                
            </div>                
            <div class="row">
                <div class="col-md-8 remember">                    
                    <input type="checkbox" name="remember" id="remember" value="false" /> @lang('messages.remember')                    
                </div>
                <div class="col-md-4    TAR">
                    <input type="submit" class="btn btn-block btn-primary" value="Entrar"/>
                </div>
            </div>
            </form>          
        </div>
    </div>   
    
</body>
</html>
