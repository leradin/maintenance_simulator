@extends('layouts.app')
@section('title', 'Crear Conocimiento')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('knowledge') }}">@lang('messages.title_knowledge')</a></li>
    <li>@lang('messages.title_create_knowledge')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_create_knowledge')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'knowledge.store','autocomplete' =>'off']) !!}
                        @include('catalog.knowledge.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
