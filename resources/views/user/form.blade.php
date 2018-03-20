<div class="block-fluid">
    <input type="hidden" id="session_id" name="session_id" value="0" />
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.enrollment')</div>
        <div class="col-md-4">
            {!! Form::text('enrollment', null, array('placeholder' => 'Matrícula','class' => 'form-control validate[required,maxSize[10]] text-input','id' => 'enrollment')) !!}
            <span class="help-block"><small>@lang('messages.required_max_10')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.type')</div>
        <div class="col-md-4">
            <nobr>
                {!! Form::radio('user', 1, true,['class' => 'form-control validate[required]']) !!}
                 Sistema   
            </nobr>
             <nobr>
                {!! Form::radio('user', 0, false,['class' => 'form-control validate[required]']) !!}
                 Estudiante
            </nobr>
            <span class="help-block"></span>
        </div> 
    </div>

     <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.password')</div>
        <div class="col-md-4">
            {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control validate[required,minSize[6],maxSize[20]]','id' => 'password')) !!}
            <span class="help-block"><small>@lang('messages.required_min_password') @lang('messages.required_max_password')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.confirm_password')</div>
        <div class="col-md-4">
            {!! Form::password('confirm_password',['placeholder' => 'Confirmar Contraseña','class' => 'form-control validate[required,equals[password]]']) !!}
            <span class="help-block"><small>@lang('messages.required_confirm_password')</small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.names')</div>
        <div class="col-md-4">
            {!! Form::text('names', null, array('placeholder' => 'Nombres','class' => 'form-control validate[required,maxSize[50]]','id' => 'names')) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.lastnames')</div>
        <div class="col-md-4">
             {!! Form::text('lastnames', null, array('placeholder' => 'Apellidos','class' => 'form-control validate[required,maxSize[50]]','id' => 'lastnames')) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>
    </div>   
    
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.degree')</div>
        <div class="col-md-4">
            {!! Form::select('degree_id',$degrees, null, ['placeholder' => 'Grado','class' => 'form-control validate[required]']) !!}                       
            <span class="help-block"><button id="add_degree" class="btn btn-link" type="button">@lang('messages.create_degree')</button>  </span>
        </div>
    
        <div class="col-md-2 TAR">@lang('messages.ascription')</div>
        <div class="col-md-4">
            {!! Form::select('ascription_id',$ascriptions, null, ['placeholder' => 'Ascripción','class' => 'form-control validate[required]']) !!}
            <span class="help-block"><button id="add_ascription" class="btn btn-link" type="button" >@lang('messages.create_ascription')</button></span>
        </div>
    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('user') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>

</div>