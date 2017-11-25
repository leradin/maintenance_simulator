        <ul class="main">
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><span class="icom-home"></span><span class="text">@lang('messages.menu_home')</span></a></li>
            <li><a href="{{ url('exercise') }}" class="{{ Request::is('exercise*') ? 'active' : '' }}"><span class="icom-file"></span><span class="text">@lang('messages.menu_exercise')</span></a></li>
            <li><a href="{{ url('stage') }}" class="{{ Request::is('stage*') ? 'active' : '' }}"><span class="icom-bookmark"></span><span class="text">@lang('messages.menu_stage')</span></a></li>
            <li><a href="{{ url('practice') }}" class="{{ Request::is('practice*') ? 'active' : '' }}"><span class="icom-newspaper"></span><span class="text">@lang('messages.menu_practice')</span></a></li>  
            <li><a href="{{ url('user') }}" class="{{ (Request::is('user*')) ? 'active' : '' }}"><span class="icom-user1"></span><span class="text">@lang('messages.menu_user')</span></a></li>
        </ul>
        
        <div class="control"></div>        

        <div class="submain">
            @include('layouts.submenu')            
        </div>