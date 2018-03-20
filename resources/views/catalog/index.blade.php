@extends('layouts.app')
@section('title', 'Catálogos')
@section('js')
    <script>
        $(document).ready(function(){
            $("a,button,span").tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_catalog')</li>
@endsection

@section('content')
            @include('layouts.message')
            <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('degree.index') }}">@lang('messages.menu_degree')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_degree')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('ascription.index') }}">@lang('messages.menu_adscription')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_ascription')
                    </div>
                </div>                
            </div>
            
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('error_type.index') }}">@lang('messages.menu_error_type')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_error_type')
                    </div>
                </div>                
            </div>
            
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('unit_type.index') }}">@lang('messages.menu_unit_type')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_unit_type')
                    </div>
                </div>                
            </div> 
            </div> 

            <div class="row">    
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('material.index') }}">@lang('messages.menu_material')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_material')
                    </div>
                </div>                
            </div> 
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('tool.index') }}">@lang('messages.menu_tool')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_tool')
                    </div>
                </div>                
            </div>

            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('instrument.index') }}">@lang('messages.menu_instrument')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_instrument')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('knowledge.index') }}">@lang('messages.menu_knowledge')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_knowledge')
                    </div>
                </div>                
            </div>
            </div>

            <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('software_behavior.index') }}">@lang('messages.menu_behaviors_software')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_software_behavior')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('hardware_behavior.index') }}">@lang('messages.menu_behaviors_hardware')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_hardware_behavior')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('objective.index') }}">@lang('messages.menu_objectives')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_objective')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('activitie.index') }}">@lang('messages.menu_activities')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_activitie')
                    </div>
                </div>                
            </div>
            </div>

            <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('solution.index') }}">@lang('messages.menu_solutions')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_solution')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('sensor.index') }}">@lang('messages.menu_sensors')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_sensor')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('sedam_fail.index') }}">@lang('messages.menu_sedam_fails')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_sedam_fail')
                    </div>
                </div>                
            </div>
            <div class="col-md-3">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-gridview"></i></div>
                        <h2><a href="{{ route('moxa_fail.index') }}">@lang('messages.menu_moxa_fails')</a></h2>
                    </div>
                    <div class="block">
                        @lang('messages.description_moxa_fail')
                    </div>
                </div>                
            </div>
            </div>                                        
            
        </div>
@endsection