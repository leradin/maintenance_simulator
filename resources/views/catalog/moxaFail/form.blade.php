<div class="block-fluid">
    <input type="hidden" id="session_id" name="session_id" value="0" />
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-4">
            {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control validate[required,maxSize[100]] text-input','id' => 'name')) !!}
            <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.description')</div>
        <div class="col-md-4">
            {!! Form::text('description', null, array('placeholder' => 'Descripción','class' => 'form-control validate[maxSize[255]] text-input','id' => 'description')) !!}
            <span class="help-block"><small>@lang('messages.required_max_255')</small></span>
        </div> 
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.topic')</div>
        <div class="col-md-2">
            {!! Form::text('topic', null, array('placeholder' => 'Topico','class' => 'form-control validate[required,maxSize[100]] text-input','id' => 'topic')) !!}
            <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.sensor')</div>
        <div class="col-md-2">
            {!! Form::text('sensor', null, array('placeholder' => 'Sensor','class' => 'form-control validate[required,maxSize[255]] text-input','id' => 'sensor')) !!}
            <span class="help-block"><small>@lang('messages.required_max_255')</small></span>
        </div> 
    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('moxa_fail') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>