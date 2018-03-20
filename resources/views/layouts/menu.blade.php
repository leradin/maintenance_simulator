        <ul class="main">
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><span class="icom-home"></span><span class="text">@lang('messages.menu_home')</span></a></li>
            <li><a href="{{ url('exercise') }}" class="{{ Request::is('exercise*') ? 'active' : '' }}"><span class="icom-bookmark"></span><span class="text">@lang('messages.menu_exercise')</span></a></li>
            <li><a href="{{ url('stage') }}" class="{{ Request::is('stage*') ? 'active' : '' }}"><span class="icom-newspaper"></span><span class="text">@lang('messages.menu_stage')</span></a></li>
            <li><a href="{{ url('practice') }}" class="{{ Request::is('practice*') ? 'active' : '' }}"><span class="icom-copy"></span><span class="text">@lang('messages.menu_practice')</span></a></li>  
            <li><a href="{{ url('user') }}" class="{{ (Request::is('user*')) ? 'active' : '' }}"><span class="icom-user1"></span><span class="text">@lang('messages.menu_user')</span></a></li>
            <li><a href="{{ url('catalog') }}" class="{{ (Request::is('catalog*')) ? 'active' : Request::is('degree*') ? 'active' : Request::is('ascription*') ? 'active' : Request::is('error_type*') ? 'active' : Request::is('unit_type*') ? 'active' : Request::is('material*') ? 'active' : Request::is('tool*') ? 'active' : Request::is('instrument*') ? 'active' : Request::is('knowledge*') ? 'active' : Request::is('software_behavior*') ? 'active' : Request::is('hardware_behavior*') ? 'active' : Request::is('objective*') ? 'active' : Request::is('activitie*') ? 'active' : Request::is('sensor*') ? 'active' : Request::is('sedam_fail*') ? 'active' : Request::is('moxa_fail*') ? 'active' : Request::is('solution*') ? 'active' : ''}}"><span class="icom-book"></span><span class="text">@lang('messages.menu_catalog')</span></a></li>
            <li><a href="{{ url('report') }}" class="{{ (Request::is('report*')) ? 'active' : '' }}"><span class="icom-article"></span><span class="text">@lang('messages.menu_report')</span></a></li>
        </ul>
        <!--div class="control"></div-->        

        <div class="submain">
            @include('layouts.submenu')            
        </div>