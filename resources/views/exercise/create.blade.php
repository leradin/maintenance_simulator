@extends('layouts.app')


@section('title', 'Crear Ejercicio')

@section('js')
    <script>
        $(document).ready(function(){
            
            var table = $('#practices_table').dataTable({
                "bPaginate": true,
                "bSort": false,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "{{ asset('js/plugins/datatables/Spanish.js') }}"
                }
            });

            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

            $("#date_time").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(date){
                    notify('Selección','Fecha : '+date);
                }
            });

           
            $("input[type='checkbox']").change(function() {
                var  elements = $(this).closest('tr');//find('.block-fluid').children();//find('table tbody tr td').children();
                if($(this).is(':checked')){
                    $.each(elements.children().find('select'),function(index, item) {
                        var select = item;
                        //select.classList.remove("select");
                        select.disabled = false;
                    });
                } else {
                    $.each(elements.children().find('select'),function(index, item) {
                        var select = item;
                        select.disabled = true;
                    });
                }
                
                
                
            });

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('exercise') }}">@lang('messages.title_exercise')</a></li>
    <li>@lang('messages.title_create_exercise')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><i class="icos-bookmark"></i></div>
                        <h2>@lang('messages.title_create_exercise')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'exercise.store','autocomplete' =>'off']) !!}    
                    <div class="block-fluid">

                        <div class="form-group">
                            <div class="col-md-2 TAR">@lang('messages.name')</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control validate[required,maxSize[50]] text-input" />
                                <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
                            </div>
                        </div>

     
                        <div class="form-group">
                            <div class="col-md-2 TAR">@lang('messages.description')</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control validate[maxSize[100]]" />
                                <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 TAR">@lang('messages.date_time')</div>
                            <div class="col-md-10">                                                            
                                <input type="text" value="{{ old('date_time') }}" name="date_time" id="date_time" class="form-control validate[required]"/>
                            </div>
                        </div>            

                        <div class="form-group">
                            <div class="col-md-2 TAR">@lang('messages.stages')</div>
                            <div class="col-md-10">
                                <table  id="practices_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th width="30%">@lang('messages.tr_name')</th>
                                        <th width="30%">@lang('messages.tr_description')</th>
                                        <th width="15%" class="TAC">@lang('messages.tr_assignment')</th>
                                        <th width="15%" class="TAC">@lang('messages.tr_table_number')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stages as $stage)
                                        <tr>
                                        <td><input  type="checkbox" value="{{ $stage->id }}" class="checkbox" name="stages_id[]" /></td>
                                        <td>{{ $stage->name }}</td>
                                        <td>{{ $stage->description }}</td>
                                        <td>
                                            <select disabled id="users" name="users_id[]" style="width: 100%;">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id}}">{{ $user->names }} {{ $user->lastnames }} ({{ $user->degree->name}})</option>
                                                @endforeach                     
                                            </select>
                                        </td>
                                        <td>
                                            <select disabled id="tables" name="tables_id[]" style="width: 100%;">
                                                @foreach($unitTypes as $unitType)
                                                    <option value="{{ $unitType->id}}">{{ $unitType->id }} ({{ $unitType->name }})</option>
                                                @endforeach                     
                                            </select>
                                        </td>
                                        <td class="TAC">
                                             <a data-id="{{ $stage->id }}" data-name="{{ $stage->name }}" class="icon-button"><span class="glyphicon glyphicon-info-sign"></span></a>  
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
