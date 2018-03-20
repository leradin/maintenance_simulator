<div class="block-fluid">
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control validate[required,maxSize[100]] text-input','id' => 'name')) !!}
            <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.abbreviation')</div>
        <div class="col-md-2">
            {!! Form::text('abbreviation', null, array('placeholder' => 'Abreviación','class' => 'form-control validate[required,maxSize[20]] text-input','id' => 'abbreviation')) !!}
            <span class="help-block"><small>@lang('messages.required_max_20')</small></span>
        </div> 

        <div class="col-md-2 TAR">@lang('messages.ip_address')</div>
        <div class="col-md-2">
            {!! Form::text('ip',(isset($unitType->ipAddress->ip) ? $unitType->ipAddress->ip : null), array('placeholder' => 'Dirección IP','class' => 'form-control validate[required,custom[ipv4] text-input','id' => 'ip')) !!}
            <span class="help-block"><small>@lang('messages.required_ip_address')</small></span>
        </div> 
    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('unit_type') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>

</div>