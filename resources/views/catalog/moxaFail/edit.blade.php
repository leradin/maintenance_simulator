@extends('layouts.app')
@section('title', 'Editar Falla MOXA')
@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li><a href="{{ url('sedam_fail') }}">@lang('messages.title_moxa_fail')</a></li>
    <li>@lang('messages.title_edit_moxa_fail')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.title_edit_moxa_fail')</h2>
                    </div>    
                    {!! Form::model($moxaFail, ['route' => ['moxa_fail.update', $moxaFail->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalog.moxaFail.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
