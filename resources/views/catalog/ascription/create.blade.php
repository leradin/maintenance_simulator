@extends('layouts.app')
@section('title', 'Crear Ascripción')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('ascription') }}">@lang('messages.title_ascription')</a></li>
    <li>@lang('messages.title_create_ascription')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_create_ascription')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'ascription.store','autocomplete' =>'off']) !!}
                        @include('catalog.ascription.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
