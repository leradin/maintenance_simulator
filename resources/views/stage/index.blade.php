@extends('layouts.app')


@section('title', 'Escenarios')
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

            $('#stages_table').dataTable({
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
                        url:"{{ url("stage") }}/"+id,
                        type : "GET",
                        dataType : 'json',
                        async : false,
                        success : function(json) {
                            console.log(json);
                            $('#modal').modal('show');
                            $('.modal-title').text("Escenario : "+json.name+'('+json.description+')');
                            var htmlBody = '<h2>'+json.name+'('+json.description+')</h2><br />';
                                                $.each(json.practices, function(index,value) {
                                                    htmlBody += '<h3>Práctica '+(index+1)+'</h3>';
                                                    htmlBody += '<table cellpadding="0" cellspacing="0" width="100%"><thead><tr><th>Nombre</th><th>Duración</th><th>Tipo de Error</th><th>Tipo de Unidad</th></tr></thead><tbody><tr><td>'+value.name+'</td><td>'+value.duration+'</td><td>'+value.error_type.name+'</td><td>'+value.unit_type.name+'</td></tr></tbody></table><h3>Detalles</h3>';
                                                    htmlBody += '<ul>';
                                                                    htmlBody += '<ul><h4>Actividades</h4>';
                                                                        $.each(value.activities, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                     htmlBody += '<ul><h4>Conocimientos</h4>';
                                                                        $.each(value.knowledge, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Materiales</h4>';
                                                                        $.each(value.materials, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Herramientas</h4>';
                                                                        $.each(value.tools, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Instrumentos</h4>';
                                                                        $.each(value.instruments, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Sensores</h4>';
                                                                        $.each(value.sensors, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Comportamiento de Software</h4>';
                                                                        $.each(value.software_behaviors, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+'('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Comportamiento de Hardware</h4>';
                                                                        $.each(value.hardware_behaviors, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+' ('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Fallas SEDAM</h4>';
                                                                        $.each(value.sedam_fails, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+' ('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                    htmlBody += '<ul><h4>Fallas MOXA</h4>';
                                                                        $.each(value.moxa_fails, function(index,value) {
                                                                            htmlBody += '<li>'+(index+1)+'. '+value.name+' ('+value.description+')</li>'; 
                                                                        });
                                                                    htmlBody += '</ul>';

                                                                htmlBody +='</ul><div class="dr"><span></span></div>';
                                                });
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
    <li>@lang('messages.title_stage')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
               @include('layouts.message') 
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-bookmark"></span></div>
                        <h2>@lang('messages.title_stage')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("stage/create") }}" title="Crear Escenario"><span class="icos-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table  id="stages_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="40%">@lang('messages.tr_name')</th>
                                        <th width="50%">@lang('messages.tr_description')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stages as $stage)
                                        <tr>
                                        <td>{{ $stage->name }}</td>
                                        <td>{{ $stage->description }}</td>
                                        <td class="TAC">
                                            {!! Form::open(['route' => ['stage.destroy',$stage],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este escenario?');"]) !!}
                                                <button class="icon-button btn btn-link" title="Eliminar" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                <a data-id="{{ $stage->id }}" class="icon-button" title="@lang('messages.info_see_exercise')"><span class="glyphicon glyphicon-info-sign"></span></a> 
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