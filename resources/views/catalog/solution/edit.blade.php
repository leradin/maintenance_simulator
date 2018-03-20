@extends('layouts.app')
@section('title', 'Editar Solución')
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('material') }}">@lang('messages.title_solution')</a></li>
    <li>@lang('messages.title_edit_solution')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_solution')</h2>
                    </div>    
                    {!! Form::model($solution, ['route' => ['solution.update', $solution->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.solution.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
