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

            // select selected
            var select_id = "";
            var action = "";

            // complete validation form
            function validationComplete(form, status){
                if(status){
                    $.ajax({
                        url: action,
                        type : "POST",
                        data: $(form).serialize(),
                        dataType : 'json',
                        success : function(json) {
                            $(select_id).append($('<option>', { 
                                value: json.id,
                                text : json.name+' ('+json.abbreviation+')' 
                            }));
                            resetForm(form);
                            hideModal('#modal');
                            
                        },
                        error : function(xhr, status) {
                        },
                        complete : function(xhr, status) {
                        }
                    });
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

            // form validate
            $('#validate_modal').validationEngine({
                onValidationComplete:validationComplete
            });
  

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
                $('#modal').modal('show');
                $('.modal-title').text(name);
                $('.modal-body .block-fluid').html(htmlBody);
                $.ajax({
                    url: action,
                    type : "POST",
                    data: $(form).serialize(),
                    dataType : 'json',
                    success : function(json) {
                        $(select_id).append($('<option>', { 
                            value: json.id,
                            text : json.name+' ('+json.abbreviation+')' 
                        }));
                        resetForm(form);
                        hideModal('#modal');
                        
                    },
                    error : function(xhr, status) {
                    },
                    complete : function(xhr, status) {
                    }
                });


            });


            $("#test").on('click',function(){
                var nodes = table.fnGetNodes();
                $.each(nodes, function(index, value) {
                    if(index,$(value).find("td:eq(0) input:checkbox").is(":checked")){
                        console.log(index,$(value).find("td:eq(0) input:checkbox").val());
                    }
                });
            });

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('student') }}">@lang('messages.title_student')</a></li>
    <li>@lang('messages.title_create_student')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-bookmark"></i></div>
                        <h2>@lang('messages.title_create_stage')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'stage.store','autocomplete' =>'off']) !!}    
                    <div class="block-fluid">

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.name')</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control validate[required,maxSize[50]] text-input" />
                                <span class="help-block">@lang('messages.required_max_50')</span>
                            </div>
                        </div>

     
                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.description')</div>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control validate[maxSize[100]]" />
                                <span class="help-block">@lang('messages.required_max_100')</span>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.practices')</div>
                            <div class="col-md-10">
                                <input type="text" name="practice_id[]" id="practice_id" />
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
                                        <td><input type="checkbox" value="{{ $practice->id }}" name="practice[]" /></td>
                                        <td>{{ $practice->name }}</td>
                                        <td>{{ $practice->duration }}</td>
                                        <td>{{ $practice->errorType->name }}</td>
                                        <td>{{ $practice->unitType->name }}</td>
                                        <td class="TAC">
                                             <a data-id="{{ $practice->id }}" data-name="{{ $practice->name }}" class="icon-button"><span class="glyphicon glyphicon-info-sign"></span></a>  
                                        </td>
                                    </tr>   
                                    @endforeach                          
                                </tbody>
                            </table>      
                            </div>
                        </div>  
                        <button id="test">Test</button>

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
