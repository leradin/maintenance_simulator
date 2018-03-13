@extends('layouts.app')
@section('title', 'Editar Conocimiento')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('knowledge') }}">@lang('messages.title_knowledge')</a></li>
    <li>@lang('messages.title_edit_knowledge')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_knowledge')</h2>
                    </div>    
                    {!! Form::model($knowledge, ['route' => ['knowledge.update', $knowledge->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.knowledge.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection