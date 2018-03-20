@extends('layouts.app')
@section('title', 'Crear Solución')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('solution') }}">@lang('messages.title_solution')</a></li>
    <li>@lang('messages.title_create_solution')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_create_solution')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'solution.store','autocomplete' =>'off']) !!}
                        @include('catalog.solution.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
