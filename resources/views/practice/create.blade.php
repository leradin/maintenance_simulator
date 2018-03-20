@extends('layouts.app')


@section('title', 'Crear Practica')

@section('js')
    <script>
        $(document).ready(function(){
            // config ajax
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });


            // select selected
            var select_id = "";
            var action = "";
            var FORM = 0;

            var selectActivitie = 0;
            var selectActivities = [[],[]];

            // complete validation form
            function validationComplete(form, status){
                if(status){
                    if(selectActivitie == 0)
                    {
                        $.ajax({
                            url: action,
                            type : "POST",
                            data: $(form).serialize(),
                            dataType : 'json',
                            success : function(json) {
                                var fieldSecond = ((FORM == 0) ? json.abbreviation : json.description);
                                var fieldThird = (json.ip_address ? json.ip_address.ip : '');
                                $(select_id).append($('<option>', { 
                                    value: json.id,
                                    text : json.name+' ('+fieldSecond+') '+fieldThird 
                                }));
                                resetForm(form);
                                hideModal('#modal');
                                
                            },
                            error : function(xhr, status) {
                            },
                            complete : function(xhr, status) {
                            }
                        });
                    }else{
                        selectActivities[0].push(selectActivitie.id);
                        selectActivities[1].push($("#solution_id").val());
                        hideModal('#modal');
                        selectActivitie = 0;
                        refreshSelectActivitie();
                    }
                }
            }

            // reset form
            function resetForm(form){
                $(form)[0].reset();
            }

            // hide modal
            function hideModal(modalId){
                $(modal).modal('hide');
            }

            // refresh select activitie
            function refreshSelectActivitie(){
                console.log("A : "+selectActivities[0].toString());
                console.log("S : "+selectActivities[1].toString());
                $("#solutions_id").val(selectActivities[1].toString());
                $("#activitie_id").select2("val",selectActivities[0]).trigger("change");
            }

            // build form modal for catalog "Error Type" y "Unit Type"
            function buildFormFieldsInCommonInModal1(){
                var htmlBody = '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.name')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="name" class="form-control validate[required,onlyLetterSp,maxSize[25]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_25')</span>'+
                                '</div>'+
                            '</div>';
                htmlBody += '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.abbreviation')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="abbreviation" class="form-control validate[required,onlyLetterSp,maxSize[10]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_10')</span>'+
                                '</div>'+
                            '</div>';
                return htmlBody;
            }
            // build form modal for catalog "Material","Tool","Instrument","Knowledge","Sofware Behavior","Hardware Behavior","Objective","Activitie","Solution"
            function buildFormFieldsInCommonInModal2(){
                var htmlBody = '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.name')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="name" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                '</div>'+
                            '</div>';
                htmlBody += '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.description')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="description" class="form-control validate[onlyLetterSp,maxSize[100]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_100')</span>'+
                                '</div>'+
                            '</div>';
                return htmlBody;
            }

            // build segment form for catalog "Solutions"
            function buildFormFieldsInCommonInModal3(){
                 var htmlBody = '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.solution')</div>'+
                                '<div class="col-md-10">';
                                    htmlBody += '<select name="solution_id" id="solution_id" class="select validate[required]" style="width: 100%;">';
                                    htmlBody += '<option value=""></option>'; 
                                    $.ajax({
                                        url: "{{ route('solution.index') }}",
                                        type : "GET",
                                        dataType : 'json',
                                        async : false,
                                        success : function(json) {
                                            $.each(json, function( key, val ) {
                                                var solution = val;
                                                htmlBody += '<option value='+solution.id+'>'+solution.name+'</option>';
                                            });
                                        },
                                        error : function(xhr, status) {
                                        },
                                        complete : function(xhr, status) {
                                        }
                                    });
                                    htmlBody += '</select>'+
                                '</div>'+
                            '</div>';
                return htmlBody;
            }

            // buils segment form for catalog "Sedam Fail"
            function buildFormFieldsInCommonInModal4(){
                htmlBody = '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.topic')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="topic" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                '</div>'+
                            '</div>';
                htmlBody += '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.file_name')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="file_name" class="form-control validate[required,onlyLetterSp,maxSize[100]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_100')</span>'+
                                '</div>'+
                            '</div>';
                htmlBody += '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.module_name')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="module_name" class="form-control validate[required,onlyLetterSp,maxSize[100]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_100')</span>'+
                                '</div>'+
                            '</div>';
                return htmlBody;
            }

            // buils segment form for catalog "Moxa Fail"
            function buildFormFieldsInCommonInModal5(){
                htmlBody = '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.topic')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="topic" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                '</div>'+
                            '</div>';
                htmlBody += '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.sensor')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" name="sensor" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                    '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                '</div>'+
                            '</div>';
                return htmlBody;
            }

            // buils segment form for catalog "Unit Type"
            function buildFormFieldsInCommonInModal6(){
                htmlBody = '<div class="form-group">'+
                                '<div class="col-md-2">@lang('messages.ip_address')</div>'+
                                '<div class="col-md-10">'+
                                    '<input type="text" id="ip" name="ip" class="form-control validate[required,custom[ipv4]] text-input"/>'+
                                    '<span class="help-block">@lang('messages.required_ip_address')</span>'+
                                '</div>'+
                            '</div>';
                return htmlBody;
            }

            // form validate
            $('#validate_modal').validationEngine({
                onValidationComplete:validationComplete
            });
            // events add new reg
            $('#add_error_type,#add_unit_type,#add_material,#add_tool,#add_instrument,#add_knowledge,#add_software_behavior,#add_hardware_behavior,#add_objective,#add_activitie,#add_solution,#add_sensor,#add_sedam_fail,#add_moxa_fail').on('click',function(){
                $('#modal').modal('show');
                var id = $(this).attr('id');
                var titleHeader = "";
                var htmlBody = "";
                switch (id) {
                    // Step 1
                    case 'add_error_type':
                        titleHeader = "Agregar Tipo de Error";
                        htmlBody = buildFormFieldsInCommonInModal1();
                        action = "{{ route('error_type.store') }}";
                        select_id = "#error_type_id";
                        FORM = 0;
                        break;
                    case 'add_unit_type':
                        titleHeader = "Agregar Tipo de Unidad";
                        htmlBody = buildFormFieldsInCommonInModal1()+buildFormFieldsInCommonInModal6();
                        action = "{{ route('unit_type.store') }}";
                        select_id = "#unit_type_id";
                        FORM = 0;
                        break;
                    // Step 2
                    case 'add_material':
                        titleHeader = "Agregar Material";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('material.store') }}";
                        select_id = "#material_id";
                        FORM = 1;
                        break;
                    case 'add_tool':
                        titleHeader = "Agregar Herramienta";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('tool.store') }}";
                        select_id = "#tool_id";
                        FORM = 1;
                        break;
                    case 'add_instrument':
                        titleHeader = "Agregar Instrumento";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('instrument.store') }}";
                        select_id = "#instrument_id";
                        FORM = 1;
                        break;
                    case 'add_knowledge':
                        titleHeader = "Agregar Conocimiento";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('knowledge.store') }}";
                        select_id = "#knowledge_id";
                        FORM = 1;
                        break;
                    case 'add_software_behavior':
                        titleHeader = "Agregar Comportamiento Software";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('software_behavior.store') }}";
                        select_id = "#software_behavior_id";
                        FORM = 1;
                        break;
                    case 'add_hardware_behavior':
                        titleHeader = "Agregar Comportamiento Hardware";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('hardware_behavior.store') }}";
                        select_id = "#hardware_behavior_id";
                        FORM = 1;
                        break;
                    case 'add_objective':
                        titleHeader = "Agregar Objetivo";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('objective.store') }}";
                        select_id = "#objective_id";
                        FORM = 1;
                        break;
                    case 'add_activitie':
                        titleHeader = "Agregar Actividad";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('activitie.store') }}";
                        select_id = "#activitie_id";
                        FORM = 1;
                        break;
                    case 'add_solution':
                        titleHeader = "Agregar Solución";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('solution.store') }}";
                        select_id = "#solution_id";
                        FORM = 1;
                        break;
                    case 'add_sensor':
                        titleHeader = "Agregar Sensor";
                        htmlBody = buildFormFieldsInCommonInModal2();
                        action = "{{ route('sensor.store') }}";
                        select_id = "#sensor_id";
                        FORM = 1;
                        break;
                     case 'add_sedam_fail':
                        titleHeader = "Agregar Falla SEDAM";
                        htmlBody = buildFormFieldsInCommonInModal2()+buildFormFieldsInCommonInModal4();
                        action = "{{ route('sedam_fail.store') }}";
                        select_id = "#sedam_fail_id";
                        FORM = 1;
                        break;
                     case 'add_moxa_fail':
                        titleHeader = "Agregar Falla MOXA";
                        htmlBody = buildFormFieldsInCommonInModal2()+buildFormFieldsInCommonInModal5();
                        action = "{{ route('moxa_fail.store') }}";
                        select_id = "#moxa_fail_id";
                        FORM = 1;
                        break;

                }
                $('.modal-title').text(titleHeader);
                $('.modal-body .block-fluid').html(htmlBody);
            });

            //
            $( "#duration" ).spinner({min: 1, max: 100, step: 1, start: 2});
            $( "#date_time" ).datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(date){
                    notify('Creación de Practica', 'Fecha Hora: '+date);
                }
            });

            $("#knowledge_id,#software_behavior_id,#hardware_behavior_id,#objective_id,#activitie_id,#solution_id,#sensor_id,#sedam_fail_id,#moxa_fail_id,#tool_id,#material_id,#instrument_id").select2({
              placeholder: "Selecciona",
              allowClear: true,
              language: "es"
            });

            $('select').on("change",function(e){
                notify('Seleccion',$(this).find("option:selected").text());
            });
            
            $('#activitie_id').on("change", function(e) { 
                if(e.added){
                    $('#modal').modal('show');
                    $('.modal-title').text("Asignar Solución");
                    $('.modal-body .block-fluid').html(buildFormFieldsInCommonInModal3());
                    selectActivitie = e.added;
                }
                if(e.removed){
                    var index = selectActivities[0].indexOf(e.removed.id);
                    selectActivities[0].splice(index,1);
                    selectActivities[1].splice(index,1);
                    refreshSelectActivitie();
                }
            });

            $('#modal').on('shown.bs.modal',function(e){
            });

            $('#modal').on('hidden.bs.modal',function(e){
                refreshSelectActivitie();
            });

            $("#form_practice").validationEngine('attach',{promptPosition : "topLeft"});
            $('#form_practice').stepy({ 
                backLabel:      'Regresar',
                block:          true,
                errorImage:     true,
                nextLabel:      'Siguiente',
                titleClick:     true,
                finishButton:   true,    
                back: function(index) {                                                                
                //if(!$("#wizard_validate").validationEngine('validate')) return false; //uncomment if u need to validate on back click                
                }, 
                next: function(index) {                
                    if(!$("#form_practice").validationEngine('validate')) return false;                
                }, 
                finish: function(index) {                
                    if(!$("#form_practice").validationEngine('validate')) return false;
            }            
            }); 

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('practice') }}">@lang('messages.title_practice')</a></li>
    <li>@lang('messages.title_create_practice')</li>
@endsection

@section('content')
     <div class="row">
            
            <div class="col-md-12">
                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-copy"></span></div>
                        <h2>@lang('messages.title_create_practice')</h2>
                    </div>                
                    <div class="block-fluid">                

                        {!! Form::open(['id' => 'form_practice', 'name' => 'form_practice','method' => 'post','route' => 'practice.store','autocomplete' =>'off']) !!} 
                                <fieldset title="@lang('messages.step_1')">                            
                                        <legend>@lang('messages.step_1_practice')</legend>
                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.name')</div>
                                            <div class="col-md-10">
                                                <input type="text" name="name" class="form-control validate[required,onlyLetterSp,maxSize[255]]"/>
                                                <span class="help-block"><small>@lang('messages.required_max_255')</small></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.duration')</div>
                                            <div class="col-md-4">                                                            
                                                <input type="text"  class="form-control validate[required,integer,maxSize[2]]" name="duration" id="duration" value="1"/>
                                            </div>                            
                                        </div> 

                                         <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.error_type')</div>
                                            <div class="col-md-4">
                                                <select id="error_type_id" name="error_type_id" class="form-control validate[required]" style="width: 100%;">
                                                    <option value=""></option>  
                                                    @foreach($errorTypes as $errorType)
                                                        <option value="{{ $errorType->id}}">{{ $errorType->name}} ({{ $errorType->abbreviation}})</option>
                                                    @endforeach                                   
                                                </select>
                                                <span class="help-block"><button id="add_error_type" class="btn btn-link" type="button">@lang('messages.create_error_type')</button>  </span>                                                                 
                                            </div>
                                            <div class="col-md-2 TAR">@lang('messages.unit_type')</div>
                                            <div class="col-md-4">                                                            
                                                <select id="unit_type_id" name="unit_type_id" class="form-control validate[required]" style="width: 100%;">
                                                    <option value=""></option>  
                                                    @foreach($unitTypes as $unitType)
                                                        <option value="{{ $unitType->id}}">{{ $unitType->name}} ({{ $unitType->abbreviation}}) {{ $unitType->ipAddress->ip}}</option>
                                                    @endforeach                                   
                                                </select>
                                                <span class="help-block"><button id="add_unit_type" class="btn btn-link" type="button">@lang('messages.create_unit_type')</button>  </span>
                                            </div>                            
                                        </div>                                
                                </fieldset>
                                

                                <fieldset title="@lang('messages.step_2')">
                                        <legend>@lang('messages.step_2_practice')</legend>
                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.material')</div>
                                            <div class="col-md-10">
                                                <select name="material_id[]" id="material_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                <option value=""></option>  
                                                @foreach($materials as $material)
                                                    <option value="{{ $material->id}}">{{ $material->name}} ({{ $material->description}})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_material" class="btn btn-link" type="button">@lang('messages.create_material')</button>  </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.tool')</div>
                                            <div class="col-md-10">
                                                <select name="tool_id[]" id="tool_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                <option value=""></option>  
                                                @foreach($tools as $tool)
                                                    <option value="{{ $tool->id}}">{{ $tool->name}} ({{ $tool->description}})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_tool" class="btn btn-link" type="button">@lang('messages.create_tool')</button>  </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.instrument')</div>
                                            <div class="col-md-10">
                                                <select name="instrument_id[]" id="instrument_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                <option value=""></option>  
                                                @foreach($instruments as $instrument)
                                                    <option value="{{ $instrument->id}}">{{ $instrument->name}} ({{ $instrument->description}})</option>
                                                @endforeach    
                                                </select>
                                                <span class="help-block"><button id="add_instrument" class="btn btn-link" type="button">@lang('messages.create_instrument')</button>  </span>
                                            </div>
                                        </div>
 
                                </fieldset>

                                <fieldset title="@lang('messages.step_3')">
                                        <legend>@lang('messages.step_3_practice')</legend>
                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.knowledge')</div>
                                            <div class="col-md-10">
                                                <select name="knowledge_id[]" id="knowledge_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($knowledges as $knowledge)
                                                    <option value="{{ $knowledge->id}}">{{ $knowledge->name}} ({{ $knowledge->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_knowledge" class="btn btn-link" type="button">@lang('messages.create_knowledge')</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.software_behavior')</div>
                                            <div class="col-md-10">
                                                <select name="software_behavior_id[]" id="software_behavior_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($softwareBehaviors as $softwareBehavior)
                                                    <option value="{{ $softwareBehavior->id}}">{{ $softwareBehavior->name}} ({{ $softwareBehavior->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_software_behavior" class="btn btn-link" type="button">@lang('messages.create_software_behavior')</button>  </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.hardware_behavior')</div>
                                            <div class="col-md-10">
                                                <select name="hardware_behavior_id[]" id="hardware_behavior_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($hardwareBehaviors as $hardwareBehavior)
                                                    <option value="{{ $hardwareBehavior->id}}">{{ $hardwareBehavior->name}} ({{ $hardwareBehavior->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_hardware_behavior" class="btn btn-link" type="button">@lang('messages.create_hardware_behavior')</button>  </span>
                                            </div>
                                        </div>
 
                                </fieldset>

                                 <fieldset title="@lang('messages.step_4')">
                                        <legend>@lang('messages.step_4_practice')</legend>
                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.objective')</div>
                                            <div class="col-md-10">
                                                <select name="objective_id[]" id="objective_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($objectives as $objective)
                                                    <option value="{{ $objective->id}}">{{ $objective->name}} ({{ $objective->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_objective" class="btn btn-link" type="button">@lang('messages.create_objective')</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.activitie')</div>
                                            <div class="col-md-10">
                                                <select name="activitie_id[]" id="activitie_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($activities as $activitie)
                                                    <option value="{{ $activitie->id}}">{{ $activitie->name}} ({{ $activitie->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_activitie" class="btn btn-link" type="button">@lang('messages.create_activitie')</button>
                                                <button id="add_solution" class="btn btn-link" type="button">@lang('messages.create_solution')</button>  </span>
                                            </div>
                                            <input type="hidden" id="solutions_id" name="solutions_id" />
                                        </div>
 
                                </fieldset>

                                <fieldset title="@lang('messages.step_5')">
                                        <legend>@lang('messages.step_5_practice')</legend>
                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.sensors')</div>
                                            <div class="col-md-10">
                                                <select name="sensor_id[]" id="sensor_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($sensors as $sensor)
                                                    <option value="{{ $sensor->id}}">{{ $sensor->name}} ({{ $sensor->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_sensor" class="btn btn-link" type="button">@lang('messages.create_sensor')</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.sedam_fails')</div>
                                            <div class="col-md-10">
                                                <select name="sedam_fail_id[]" id="sedam_fail_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($sedamFails as $sedamFail)
                                                    <option value="{{ $sedamFail->id}}">{{ $sedamFail->name}} ({{ $sedamFail->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_sedam_fail" class="btn btn-link" type="button">@lang('messages.create_sedam_fail')</button>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2 TAR">@lang('messages.moxa_fails')</div>
                                            <div class="col-md-10">
                                                <select name="moxa_fail_id[]" id="moxa_fail_id" multiple="multiple" class="validate[required]" style="width: 100%;">
                                                @foreach($moxaFails as $moxaFail)
                                                    <option value="{{ $moxaFail->id}}">{{ $moxaFail->name}} ({{ $moxaFail->description }})</option>
                                                @endforeach       
                                                </select>
                                                <span class="help-block"><button id="add_moxa_fail" class="btn btn-link" type="button">@lang('messages.create_moxa_fail')</button>
                                                </span>
                                            </div>
                                        </div>
 
                                </fieldset>
                                
                                <input type="submit" class="btn btn-primary finish" value="@lang('messages.submit')" />
                        {!!Form::close()!!}  
                    </div>

                </div>
                
            </div>            
            
        </div>
@endsection

@section('modal')
     @include('layouts.modal')
@endsection
