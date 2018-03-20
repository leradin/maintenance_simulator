@extends('layouts.app')
@section('title', 'Editar Intrumento')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('instrument') }}">@lang('messages.title_instrument')</a></li>
    <li>@lang('messages.title_edit_instrument')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_instrument')</h2>
                    </div>    
                    {!! Form::model($instrument, ['route' => ['instrument.update', $instrument->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.instrument.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection