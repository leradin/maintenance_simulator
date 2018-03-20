@extends('layouts.app')
@section('title', 'Crear Comportamiento de Software')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('software_behavior') }}">@lang('messages.title_software_behavior')</a></li>
    <li>@lang('messages.title_create_software_behavior')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_create_software_behavior')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'software_behavior.store','autocomplete' =>'off']) !!}
                        @include('catalog.softwareBehavior.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
