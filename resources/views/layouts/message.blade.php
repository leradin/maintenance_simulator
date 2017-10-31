@if (session('message.type'))
	<div class="alert {{ session('message.type') == 'error' ? 'alert-danger' : 'alert-success' }}">            
    	<strong><i class="glyphicon {{ session('message.type') == 'error' ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-ok' }}"></i></strong> {{ session('message.status') }}
    </div>
@endif