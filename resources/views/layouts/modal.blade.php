<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    {!! Form::open(['id' => 'validate_modal', 'name' => 'validate_modal','autocomplete' =>'off']) !!} 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
           
        <div class="block-fluid">

        </div>
                       
      </div>
      <div class="modal-footer">
        <button id="hide_prompts" class="btn btn-info" type="button" onClick="$('#validate_modal').validationEngine('hide');">@lang('messages.hide_prompts')</button>
        <button id="save" class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
      </div>
    </div>
    {!!Form::close()!!}  
  </div>
</div>