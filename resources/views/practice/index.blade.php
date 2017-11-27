@extends('layouts.app')


@section('title', 'Practicas')
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

            // table practices
            $('#practices_table').dataTable({
                "bPaginate": true,
                "bSort": true,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "{{ asset('js/plugins/datatables/Spanish.js') }}"
                }
            });

            // button show practice
            $('a').on('click',function(){
                var id = $(this).attr('data-id');

                if(id){
                    $.ajax({
                        url:"{{ url("practice") }}/"+id,
                        type : "GET",
                        dataType : 'json',
                        async : false,
                        success : function(json) {
                            $('#modal').modal('show');
                            $('.modal-title').text("Practica : "+json.name);
                             var htmlBody = '<h5>'+json.name+'</h5>'+
                                                '<div class="row">'+
                                                    '<div class="col-md-12">'+
                                                        '<ul>'+
                                                            '<li>Duración : '+json.duration+'.</li>'+
                                                            '<li>Tipo Error : '+json.error_type.name+' ('+json.error_type.abbreviation+').</li>'+
                                                            '<li>Tipo Unidad : '+json.unit_type.name+' ('+json.unit_type.abbreviation+').</li>'+
                                                        '</ul>'+
                                                    '</div>'+
                                                '</div>'+
                                            '<div class="block-fluid tabbable tabs-left">'+
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
    <li>@lang('messages.title_practice')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-copy"></span></div>
                    <h2>@lang('messages.title_practice')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("practice/create") }}" title="Crear Práctica"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="practices_table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
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
                                    <td>{{ $practice->name }}</td>
                                    <td>{{ $practice->duration }}</td>
                                    <td>{{ $practice->errorType->name }}</td>
                                    <td>{{ $practice->unitType->name }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['practice.destroy',$practice],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar esta práctica?');"]) !!}
                                            <button class="icon-button btn btn-link" title="Eliminar" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                            <a data-id="{{ $practice->id }}" class="icon-button" title="@lang('messages.info_see_exercise')"><span class="glyphicon glyphicon-info-sign"></span></a>
                                        {!!Form::close()!!}
                                    </td>
                                </tr>   
                                @endforeach                          
                            </tbody>
                        </table>                    
                    </div> 
            </div>                         
        </div>
    </div>
@endsection
@section('modal')
     @include('layouts.modal')
@endsection