@extends('layouts.app')
@section('title', 'Editar Grado')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('error_type') }}">@lang('messages.title_error_type')</a></li>
    <li>@lang('messages.title_edit_error_type')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_error_type')</h2>
                    </div>    
                    {!! Form::model($errorType, ['route' => ['error_type.update', $errorType->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.errorType.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
