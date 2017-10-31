@extends('layouts.app')


@section('title', 'Usuarios')


@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('user') }}">@lang('messages.title_user')</a></li>
    <li>@lang('messages.title_create_user')</li>
@endsection

@section('content')
    <div class="row">
            
            <div class="col-md-12">                
                
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-user1"></i></div>
                        <h2>@lang('messages.title_create_user')</h2>
                    </div>                                               
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'user.store']) !!}    
                    <div class="block-fluid">

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.name')</div>
                            <div class="col-md-10">
                                <input type="text" name="name" class="form-control validate[required,maxSize[50]]"/>
                                <span class="help-block">@lang('messages.required_max_50')</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.email')</div>
                            <div class="col-md-10">
                                <input type="text" name="email" class="form-control validate[required,custom[email]]"/>
                                <span class="help-block">@lang('messages.required_email')</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.password')</div>
                            <div class="col-md-10">
                                <input type="password" name="password" class="form-control validate[required,minSize[6],maxSize[20]]" id="password"/>
                                <span class="help-block">@lang('messages.required_min_password') @lang('messages.required_max_password')</span>
                            </div>
                        </div>                    
                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.confirm_password')</div>
                            <div class="col-md-10">
                                <input type="password" name="confirm_password" class="form-control validate[required,equals[password]]"/>
                                <span class="help-block">@lang('messages.required_confirm_password')</span>
                            </div>
                        </div>

                        <div class="toolbar bottom TAR">
                            <div class="btn-group">
                                <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
                                <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
                            </div>
                        </div>

                    </div>
                    {!!Form::close()!!}                
                </div>
            </div>            
        </div> 

@endsection