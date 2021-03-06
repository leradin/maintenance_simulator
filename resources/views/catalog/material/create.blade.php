@extends('layouts.app')
@section('title', 'Crear Material')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('material') }}">@lang('messages.title_material')</a></li>
    <li>@lang('messages.title_create_material')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_create_material')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'material.store','autocomplete' =>'off']) !!}
                        @include('catalog.material.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
