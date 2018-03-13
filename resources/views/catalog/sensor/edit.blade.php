@extends('layouts.app')
@section('title', 'Editar Sensor')
@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('sensor') }}">@lang('messages.title_sensor')</a></li>
    <li>@lang('messages.title_edit_sensor')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_sensor')</h2>
                    </div>    
                    {!! Form::model($sensor, ['route' => ['sensor.update', $sensor->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.sensor.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
