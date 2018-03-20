@extends('layouts.app')
@section('title', 'Editar Grado')
@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('degree') }}">@lang('messages.title_degree')</a></li>
    <li>@lang('messages.title_edit_degree')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_degree')</h2>
                    </div>    
                    {!! Form::model($degree, ['route' => ['degree.update', $degree->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.degree.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
