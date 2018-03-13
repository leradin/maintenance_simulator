@extends('layouts.app')
@section('title', 'Crear Tipo de Unidad')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('unit_type') }}">@lang('messages.title_unit_type')</a></li>
    <li>@lang('messages.title_create_unit_type')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_create_unit_type')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'unit_type.store','autocomplete' =>'off']) !!}
                        @include('catalog.unitType.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
