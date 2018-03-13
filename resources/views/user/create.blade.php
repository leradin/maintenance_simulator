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
                        htmlBody += /*'<div class="form-group">'+
                                        '<div class="col-md-2">@ lang('messages.priority')</div>'+
                                        '<div class="col-md-10">'+*/
                                            '<input type="hidden" name="priority" value="1" class="form-control validate[required,maxSize[3]]"/>';
                                            /*'<span class="help-block">@ lang('messages.required_max_10')</span>'+
                                        '</div>'+
                                    '</div>';*/
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
                    <div class="head dark">
                        <div class="icon"><span class="icos-user1"></span></div>
                        <h2>@lang('messages.title_create_user')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'user.store','autocomplete' =>'off']) !!}
                        @include('user.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection

@section('modal')
     @include('layouts.modal')
@endsection
