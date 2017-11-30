@extends('layouts.app')

@section('title', 'Inicio')

@section('js')
@endsection


@section('content')
  	<div class="row">
    <div class="col-md-12">
		<div class="widget">
	        <div class="profile clearfix">
	            <div class="image">
	                <img src="{{ asset('img/backgrounds/background.png') }}" class="img-thumbnail">
	            </div>                        
	            <div class="info">
	                <h2>{{  Auth::user()->names }} {{  Auth::user()->lastnames }}</h2>
	                <p><strong>@lang('messages.enrollment'):</strong> {{  Auth::user()->enrollment }}</p>
	                <p><strong>@lang('messages.degree'):</strong> {{  Auth::user()->degree->name }}</p>
	                <p><strong>@lang('messages.ascription'):</strong> {{  Auth::user()->ascription->name }}</p>
	                <div class="status">{{ Auth::user()->user ? 'Usuario' : 'Estudiante' }}</div>
	            </div>
	        </div>
	    </div>     
    </div>
    </div>   
@endsection