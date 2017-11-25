@extends('layouts.app')


@section('title', 'Crear Escenario')

@section('js')
    <script>
        $(document).ready(function(){
            // config ajax
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $("a,button,span").tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });

            // complete validation form
            function validationComplete(form, status){
                if(status){
                    var nodes = table.fnGetNodes();
                    var practices_id = []; 
                    $.each(nodes, function(index, value) {
                        if(index,$(value).find("td:eq(0) input:checkbox").is(":checked")){
                            //console.log(index,$(value).find("td:eq(0) input:checkbox").val());
                            practices_id.push($(value).find("td:eq(0) input:checkbox").val());
                            
                        }
                    });
                    //$('#practice_id').val(practices_id.toString());
                    //console.log(practices_id.toString());
                }
            }

            var table = $('#practices_table').dataTable({
                "bPaginate": true,
                "bSort": false,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
            });

            $("a").on("click",function(){
                var id = $(this).attr("data-id");
                var name = $(this).attr("data-name");
                var url = $(this).attr("href");
                if(!url){
                    $('#modal').modal('show');
                    $('.modal-title').text("Practica : "+name);
                    
                    $.ajax({
                        url:"{{ url("practice") }}/"+id,
                        type : "GET",
                        dataType : 'json',
                        success : function(json) {
                            var htmlBody = '<div class="block-fluid tabbable tabs-left">'+
                                            '<ul class="nav nav-tabs">'+
                                                '<li class="active">'+
                                                    '<a href="#tab1" data-toggle="tab">Materiales('+json.materials.length+')</a></li>'+
                                                '<li>'+
                                                    '<a href="#tab2" data-toggle="tab">Herramientas('+json.tools.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab3" data-toggle="tab">Instrumentos('+json.instruments.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab4" data-toggle="tab">Conocimientos('+json.knowledge.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab5" data-toggle="tab">Objetivos('+json.objectives.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab6" data-toggle="tab">Actividades('+json.activities.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab7" data-toggle="tab">Comportamientos de Software('+json.software_behaviors.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab8" data-toggle="tab">Comportamientos de Hardware('+json.hardware_behaviors.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab9" data-toggle="tab">Sensores('+json.sensors.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab10" data-toggle="tab">Fallas SEDAM('+json.sedam_fails.length+')</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<a href="#tab11" data-toggle="tab">Fallas MOXA('+json.moxa_fails.length+')</a>'+
                                                '</li>'+
                                            '</ul>'+
                                            '<div class="tab-content">'+

                                                '<div class="tab-pane active" id="tab1">';
                                                    $.each(json.materials, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab2">';
                                                    $.each(json.tools, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab3">';
                                                    $.each(json.instruments, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab4">';
                                                    $.each(json.knowledge, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab5">';
                                                    $.each(json.objectives, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab6">';
                                                    $.each(json.activities, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab7">';
                                                    $.each(json.software_behaviors, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab8">';
                                                    $.each(json.hardware_behaviors, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab9">';
                                                    $.each(json.sensors, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab10">';
                                                    $.each(json.sedam_fails, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';

                                                htmlBody += '<div class="tab-pane" id="tab11">';
                                                    $.each(json.moxa_fails, function(index,value) {
                                                        htmlBody += '<p>'+(index+1)+'. '+value.name+'('+value.description+')</p>'; 
                                                    });
                                                htmlBody += '</div>';
                                            '</div>'+
                                            '</div>'; 
                            console.log(json);
                            $('.modal-body .block-fluid').html(htmlBody);
                            $('#save').hide();
                            $('#hide_prompts').hide();
                        },
                        error : function(xhr, status) {
                        },
                        complete : function(xhr, status) {
                        }
                    });
                }

            });

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('stage') }}">@lang('messages.title_stage')</a></li>
    <li>@lang('messages.title_create_stage')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-bookmark"></span></div>
                        <h2>@lang('messages.title_create_stage')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'stage.store','autocomplete' =>'off']) !!}    
                    <div class="block-fluid">

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.name')</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control validate[required,maxSize[50]] text-input" />
                                <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
                            </div>
                        </div>

     
                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.description')</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control validate[maxSize[100]]" />
                                <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.practices')</div>
                            <div class="col-md-10">
                                <!--input type="text" name="practice_id" id="practice_id" /-->
                                <table  id="practices_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="30%">@lang('messages.tr_name')</th>
                                        <th width="20%">@lang('messages.tr_duration')</th>
                                        <th width="20%">@lang('messages.tr_error_type')</th>
                                        <th width="20%">@lang('messages.tr_unit_type')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($practices as $practice)
                                        <tr>
                                        <td><input type="checkbox" value="{{ $practice->id }}" name="practices_id[]" /></td>
                                        <td>{{ $practice->name }}</td>
                                        <td>{{ $practice->duration }}</td>
                                        <td>{{ $practice->errorType->name }}</td>
                                        <td>{{ $practice->unitType->name }}</td>
                                        <td class="TAC">
                                             <a data-id="{{ $practice->id }}" title="Ver información" data-name="{{ $practice->name }}" class="icon-button"><span class="glyphicon glyphicon-info-sign"></span></a>  
                                        </td>
                                    </tr>   
                                    @endforeach                          
                                </tbody>
                            </table>      
                            </div>
                        </div>  
                        <div class="toolbar bottom TAR">
                            <div class="btn-group">
                                <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
                                <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
                            </div>
                        </div>

                    </div>
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection

@section('modal')
     @include('layouts.modal')
@endsection
