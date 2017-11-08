@extends('layouts.app')


@section('title', 'Usuarios')

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
            // events add new reg
            $('#add_degree,#add_ascription').on('click',function(){
                $('#modal').modal('show');
                var id = $(this).attr('id');
                var titleHeader = "";
                var htmlBody = "";
                switch (id) {
                    case 'add_degree':

                        titleHeader = "Agregar Grado";
                        htmlBody = '<div class="form-group">'+
                                        '<div class="col-md-2">@lang('messages.degree')</div>'+
                                        '<div class="col-md-10">'+
                                            '<input type="text" name="name" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                            '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                        '</div>'+
                                    '</div>';
                        htmlBody += '<div class="form-group">'+
                                        '<div class="col-md-2">@lang('messages.abbreviation')</div>'+
                                        '<div class="col-md-10">'+
                                            '<input type="text" name="abbreviation" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                            '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                        '</div>'+
                                    '</div>';
                        htmlBody += '<div class="form-group">'+
                                        '<div class="col-md-2">@lang('messages.priority')</div>'+
                                        '<div class="col-md-10">'+
                                            '<input type="text" name="priority" class="form-control validate[required,maxSize[3]]"/>'+
                                            '<span class="help-block">@lang('messages.required_max_10')</span>'+
                                        '</div>'+
                                    '</div>';
                        action = "{{ route('degree.store') }}";
                        select_id = "#degree_id";
                        break;
                    case 'add_ascription':
                        titleHeader = "Agregar Adscripción";
                        htmlBody = '<div class="form-group">'+
                                        '<div class="col-md-2">@lang('messages.ascription')</div>'+
                                        '<div class="col-md-10">'+
                                            '<input type="text" name="name" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                            '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                        '</div>'+
                                    '</div>';
                        htmlBody += '<div class="form-group">'+
                                        '<div class="col-md-2">@lang('messages.abbreviation')</div>'+
                                        '<div class="col-md-10">'+
                                            '<input type="text" name="abbreviation" class="form-control validate[required,onlyLetterSp,maxSize[50]]"/>'+
                                            '<span class="help-block">@lang('messages.required_max_50')</span>'+
                                        '</div>'+
                                    '</div>';
                        action = "{{ route('ascription.store') }}";
                        select_id = "#ascription_id";
                        break;
                }
                $('.modal-title').text(titleHeader);
                $('.modal-body .block-fluid').html(htmlBody);
            });
        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('user') }}">@lang('messages.title_user')</a></li>
    <li>@lang('messages.title_create_user')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head">
                        <div class="icon"><i class="icosg-user1"></i></div>
                        <h2>@lang('messages.title_create_user')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'user.store','autocomplete' =>'off']) !!}    
                    <div class="block-fluid">

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.enrollment')</div>
                            <div class="col-md-10">
                                <input type="text" id="enrollment" name="enrollment" class="form-control validate[required,maxSize[10]] text-input" />
                                <span class="help-block">@lang('messages.required_max_10')</span>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-md-2">@lang('messages.password')</div>
                            <div class="col-md-4">
                                <input type="password" name="password" class="form-control validate[required,minSize[6],maxSize[20]]" id="password"/>
                                <span class="help-block">@lang('messages.required_min_password') @lang('messages.required_max_password')</span>
                            </div>

                            <div class="col-md-2 TAR">@lang('messages.confirm_password')</div>
                            <div class="col-md-4">
                                <input type="password" name="confirm_password" class="form-control validate[required,equals[password]]"/>
                                <span class="help-block">@lang('messages.required_confirm_password')</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.names')</div>
                            <div class="col-md-4">
                                <input type="text" value="{{ old('names') }}" name="names" class="form-control validate[required,maxSize[50]]"/>
                                <span class="help-block">@lang('messages.required_max_50')</span>
                            </div>

                            <div class="col-md-2 TAR">@lang('messages.lastnames')</div>
                            <div class="col-md-4">
                                <input type="text" value="{{ old('lastnames') }}" name="lastnames" class="form-control validate[required,maxSize[50]]" />
                                <span class="help-block">@lang('messages.required_max_50')</span>
                            </div>
                        </div>   
                        
                        <div class="form-group">
                            <div class="col-md-2">@lang('messages.degree')</div>
                            <div class="col-md-4">                            
                                <select id="degree_id" name="degree_id" class="form-control validate[required]" style="width: 100%;">
                                    <option value=""></option>  
                                    @foreach($degrees as $degree)
                                        <option value="{{ $degree->id}}" @if(old('degree_id') == $degree->id )selected @endif>{{ $degree->name}} ({{ $degree->abbreviation}})</option>
                                    @endforeach                                   
                                </select>                            
                                <span class="help-block"><button id="add_degree" class="btn btn-link" type="button">@lang('messages.create_degree')</button>  </span>
                            </div>
                        
                            <div class="col-md-2 TAR">@lang('messages.ascription')</div>
                            <div class="col-md-4">                            
                                <select id="ascription_id" name="ascription_id" class="form-control validate[required]" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach($ascriptions as $ascription)
                                        <option value="{{ $ascription->id}}" @if(old('ascription_id') == $ascription->id )selected @endif>{{ $ascription->name}} ({{ $ascription->abbreviation}})</option>
                                    @endforeach                                                                          
                                </select>                            
                                <span class="help-block"><button id="add_ascription" class="btn btn-link" type="button" >@lang('messages.create_ascription')</button></span>
                            </div>
                        </div>

                        <div class="form-group">                       
                            <div class="col-md-2">@lang('messages.type'):</div>
                            <div class="col-md-4">
                                <nobr><input type="radio" class="form-control validate[required]" name="user" value="1"/> Sistema </nobr> <nobr><input type="radio" class="form-control validate[required]" name="user" value="0"/> Estudiante</nobr>
                                <span class="help-block"></span>
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
