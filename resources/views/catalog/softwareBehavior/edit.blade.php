@extends('layouts.app')
@section('title', 'Editar Comportamiento de Software')
@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('software_behavior') }}">@lang('messages.title_software_behavior')</a></li>
    <li>@lang('messages.title_edit_software_behavior')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_software_behavior')</h2>
                    </div>    
                    {!! Form::model($softwareBehavior, ['route' => ['software_behavior.update', $softwareBehavior->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.softwareBehavior.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
