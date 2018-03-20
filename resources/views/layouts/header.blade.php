  <a href="{{ url('/') }}" class="logo {{ Request::is('/') ? 'active' : '' }}"></a>

        <div class="buttons">
            <div class="popup" id="subNavControll">
                <div class="label"><span class="icos-list"></span></div>
            </div>
            <div class="dropdown">
                <div class="label"><span class="icos-user2"></span></div>
                <div class="body" style="width: 160px;">
                    <!--div class="itemLink">
                        <a href="#"><span class="glyphicon glyphicon-cog"></span> @ lang('messages.settings')</a>
                    </div>
                    <div class="itemLink">
                        <a href="#"><span class="glyphicon glyphicon-comment"></span> @ lang('messages.messages')</a>
                    </div-->                    
                    <div class="itemLink">
                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-off"></span> @lang('messages.logout')
                                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                        </form>
                    </div>                                        
                </div>                
            </div>            
            <!--div class="popup">
                <div class="label"><span class="icos-search1"></span></div>
                <div class="body">
                    <div class="arrow"></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">                    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>                                    
                                    <input type="text" name="search" placeholder="Keyword..." class="form-control"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button">Search</button>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
            <div class="popup">
                <div class="label"><span class="icos-cog"></span></div>
                <div class="body">
                    <div class="arrow"></div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <span class="help-block">Temas:</span>
                                <div class="themes">
                                    <a href="#" data-theme="" class="tip" title="Default"><img src="{{ asset('img/themes/default.jpg') }}"/></a>                                    
                                    <a href="#" data-theme="ssDaB" class="tip" title="DaB"><img src="{{ asset('img/themes/dab.jpg')}}"/></a>
                                    <a href="#" data-theme="ssTq" class="tip" title="Tq"><img src="{{ asset('img/themes/tq.jpg')}}"/></a>
                                    <a href="#" data-theme="ssGy" class="tip" title="Gy"><img src="{{ asset('img/themes/gy.jpg')}}"/></a>
                                    <a href="#" data-theme="ssLight" class="tip" title="Light"><img src="{{ asset('img/themes/light.jpg')}}"/></a>
                                    <a href="#" data-theme="ssDark" class="tip" title="Dark"><img src="{{ asset('img/themes/dark.jpg')}}"/></a>
                                    <a href="#" data-theme="ssGreen" class="tip" title="Green"><img src="{{ asset('img/themes/green.jpg')}}"/></a>
                                    <a href="#" data-theme="ssRed" class="tip" title="Red"><img src="{{ asset('img/themes/red.jpg')}}"/></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span class="help-block">Fondos:</span>
                                <div class="backgrounds">
                                    <a href="#" data-background="bg_default" class="bg_default"></a>
                                    <a href="#" data-background="bg_mgrid" class="bg_mgrid"></a>
                                    <a href="#" data-background="bg_crosshatch" class="bg_crosshatch"></a>
                                    <a href="#" data-background="bg_hatch" class="bg_hatch"></a>                                    
                                    <a href="#" data-background="bg_light_gray" class="bg_light_gray"></a>
                                    <a href="#" data-background="bg_dark_gray" class="bg_dark_gray"></a>
                                    <a href="#" data-background="bg_texture" class="bg_texture"></a>
                                    <a href="#" data-background="bg_light_orange" class="bg_light_orange"></a>
                                    <a href="#" data-background="bg_yellow_hatch" class="bg_yellow_hatch"></a>                        
                                    <a href="#" data-background="bg_green_hatch" class="bg_green_hatch"></a>                        
                                </div>
                            </div>          
                        </div>
                        <!--div class="form-group">
                            <div class="col-md-12">
                                <span class="help-block">Navigation:</span>
                                <input type="radio" name="navigation" id="fixedNav"/> Fixed 
                                <input type="radio" name="navigation" id="collapsedNav"/> Collapsible
                                <input type="radio" name="navigation" id="hiddenNav"/> Hidden
                            </div>                                
                        </div-->
                    </div>
                </div>
            </div>

        </div>