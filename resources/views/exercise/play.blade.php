@extends('layouts.app')
@section('title', 'Reproduciendo')
@section('js')
    <script>
        const KINEMATIC_ACTIONS = 0;
        const PRACTICE_ACTIONS = 1;
        const KILL_TABLE_ACTIONS = 1;
        const KILL_FINISH_PRACTICE = 2;

        $(document).ready(function(){
            // Configuration ajax
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            // Configuration tooltip
            $( "button,a" ).tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                },
                position: {
                    my: "left+15 center",
                    at: "right center",
                    collision: "flipfit"
                },
            });

            // Variables
            var cookies = {};
            var dateNow = Date();

            verifyTime();
            
            // Events
            $("#restartExercise").click(function(){
                if (!confirm('@lang('messages.question_restart_exercise')')){
                    return false;
                }else{
                   removeAllCookies();
                }
            });

            $('button').on('click',function(event) {
                event.stopPropagation(); // prevent default bootstrap behavior
                var tableId = $(this).attr('data-table_id');
                var practiceId = parseInt($(this).attr('data-practice_id'));
                var exerciseId = parseInt($(this).attr('data-exercise_id'));
                var userId = parseInt($(this).attr('data-user_id'));
                var sensorName = $(this).text();
                var status = $(this).attr('data-status');
                var errorType = parseInt($(this).attr("data-error"));
                if(status >= 0){
                    var element = $('#'+tableId+practiceId);
                    var duration = $('#'+tableId+practiceId).text();
                    var objectSendPractice = {};
                    objectSendPractice.exercise_id = exerciseId;
                    objectSendPractice.practice_id = practiceId;
                    objectSendPractice.user_id = userId;
                    objectSendPractice.table_id = tableId;
                    objectSendPractice.time = parseInt(duration.substr(0,2))*60;
                    if(status == 0){
                        if(confirmed('@lang('messages.question_start_practice')')){
                            cookies[tableId+practiceId] = Date();
                            Cookies.set('durations', cookies);
                            $(this).removeClass("btn-primary").addClass("btn-danger").text('@lang('messages.button_practice_finish')');
                            initTimer(element,(duration.substr(0,2)+'h'),$(this));
                            $(this).attr("data-status", "1");
                            actions(objectSendPractice,PRACTICE_ACTIONS); 
                        }
                    }else if(status == 1){
                        if(confirmed('@lang('messages.question_end_practice')')){
                            $(this).addClass("disabled btn-danger").text('@lang('messages.button_finished_practice')');
                            endTimer(element,(tableId+practiceId),duration);
                            $(this).attr("data-status", "2");
                            actions(objectSendPractice,KILL_FINISH_PRACTICE);
                            console.log('duration'+duration);
                        } 
                    }
                }else{
                    var enable = false;
                    if($(this).hasClass('btn-danger')){
                        $(this).removeClass("btn-danger").addClass("btn-success");
                        enable = true;
                    }else{
                        $(this).removeClass("btn-success").addClass("btn-danger");
                        enable = false;
                    } 
                    
                    if(userId){
                        return false;
                    }  

                    // for error type
                    var objectSendKinematic = {};
                        objectSendKinematic.idMesa = tableId;
                    switch(errorType) {
                        case 0: // for sensor
                            objectSendKinematic.sensor = sensorName;
                            objectSendKinematic.active = enable;
                            actions(objectSendKinematic,KINEMATIC_ACTIONS);  
                            break;
                        case 1: // for sedam
                            var fileName = $(this).attr('data-file_name');
                            var moduleName = $(this).attr('data-module_name');
                            var ipAddress = $(this).attr('data-ip_address');
                            var unit = $(this).attr('data-unit');
                            var topic = $(this).attr('data-topic');
                            var  newConfigJSON = [{ port: '0000', ip: '172.16.212.13', name: 'GPS' },
                                { port: '999', ip: '172.16.212.55', name: 'Gyro' },
                                { port: '1111', name: 'SoundDeeper' }];

                            objectSendKinematic.fileName = fileName;
                            objectSendKinematic.moduleName = moduleName;
                            objectSendKinematic.unidad = unit;
                            objectSendKinematic.newConfigJSON = newConfigJSON;
                            objectSendKinematic.ip = ipAddress;
                            objectSendKinematic.status = (enable ? 'good' : 'bad');
                            objectSendKinematic.topic = topic;
                            actions(objectSendKinematic,KINEMATIC_ACTIONS);
                            break;
                        case 2: // for moxxa
                            var topic = $(this).attr('data-topic');
                            var sensor = $(this).attr('data-sensor');
                            //objectSendKinematic.portName = sensor;
                            //objectSendKinematic.portNumber = 3004;
                            objectSendKinematic.moxaType = 'INTERNAL';
                            objectSendKinematic.topic = topic;
                            actions(objectSendKinematic,KINEMATIC_ACTIONS);
                            break;
                    } 
                }
            });

            $('a').on('click',function(event){
                event.stopPropagation(); // prevent default bootstrap behavior
                var tableId = $(this).attr('data-table_id');
                if(tableId !== undefined){
                    if(confirmed('@lang('messages.question_end_all_practices_of_table') '+tableId+'?')){
                        var objectKillTable = {};
                        objectKillTable.table_id = tableId;
                        actions(objectKillTable,KILL_TABLE_ACTIONS);
                    }
                }
                event.preventDefault();
            });
            
            // Functions
            function confirmed(message){
                var pass = confirm(message);
                if (pass) {
                    return true;
                } else {
                    return false;
                } 
            }

            function initTimer(element,duration,elementButton){
                $(element).timer({
                    countdown: true,
                    seconds:    '0',      // The number of seconds to start the timer from
                    duration:   duration,   // The time to countdown from. `seconds` and `duration` are mutually exclusive
                    callback:   function(){
                        alert("El tiempo de la practica ha finalizado");
                        $(elementButton).addClass("disabled").text('@lang('messages.button_finished_practice')');
                    }, // If duration is set, this function is called after `duration` has elapsed
                    repeat:     false,     // If duration is set, `callback` will be called repeatedly
                    format:     '%H:%M:%S'    // Format to show time in
                });
            }

            function endTimer(element,id,duration){
                cookies[id] = duration;
                Cookies.set('durations', cookies);
                $(element).timer('pause');
            }
            
            function actions(objectSend,typeActions){
                var url = "";
                if(typeActions ==  KINEMATIC_ACTIONS || typeActions ==  KILL_TABLE_ACTIONS){
                    url = "{{ url('send_kinect') }}";
                }if(typeActions == PRACTICE_ACTIONS){
                    url = "{{ url('start_practice') }}";
                }if(typeActions == KILL_FINISH_PRACTICE){
                    url = "{{ url('finish_practice') }}";
                }
                
                $.ajax({
                    url: url,
                    type : "GET",
                    data: objectSend,
                    dataType : 'json',
                    success : function(json) {
                        console.log(json);
                    },
                    error : function(xhr, status) {
                        console.log(xhr);
                    },
                    complete : function(xhr, status) {
                    }
                });
            }

            function parseMillisecondsIntoReadableTime(milliseconds){
              //Get hours from milliseconds
              var hours = milliseconds / (1000*60*60);
              var absoluteHours = Math.floor(hours);
              var h = absoluteHours > 9 ? absoluteHours : '0' + absoluteHours;

              //Get remainder from hours and convert to minutes
              var minutes = (hours - absoluteHours) * 60;
              var absoluteMinutes = Math.floor(minutes);
              var m = absoluteMinutes > 9 ? absoluteMinutes : '0' +  absoluteMinutes;

              //Get remainder from minutes and convert to seconds
              var seconds = (minutes - absoluteMinutes) * 60;
              var absoluteSeconds = Math.floor(seconds);
              var s = absoluteSeconds > 9 ? absoluteSeconds : '0' + absoluteSeconds;
              return h + ':' + m + ':' + s;
            }

            function verifyTime(){
                if(Cookies.get('durations')){
                $.each(JSON.parse(Cookies.get('durations')), function (index, value) {                   
                    cookies[index] =  value; 
                    var differenceNowVsInitPractice = Math.abs(Date.parse(dateNow)-Date.parse(value));
                    var dateNowVsInitPractice = new Date(differenceNowVsInitPractice);
                    var convertFormatDate = new moment(parseMillisecondsIntoReadableTime(dateNowVsInitPractice.getTime()),'hh:mm:ss');
                    var dateFormatText = new moment($('#'+index).text(),'hh:mm:ss');
                    var dateNew = new Date(Math.abs(convertFormatDate.local().toDate()-dateFormatText.local().toDate()));
                    var timeOut = new moment(parseMillisecondsIntoReadableTime(dateNew.getTime()),'hh:mm:ss');
                    if(convertFormatDate > dateFormatText){
                        alert("Se finalizalo el tiempo de la práctica #"+index.charAt(1)+" de la mesa "+index.charAt(0));
                        $("#button"+index).addClass("disabled btn-danger").text('@lang('messages.button_finished_practice')');
                        $("#button"+index).attr("data-status", "2");
                    }else{
                        var element = $('#'+index);
                        var duration = parseMillisecondsIntoReadableTime(dateNew.getTime()).replace(":","h");
                        duration = duration.replace(":","m");
                        duration += "s";
                        // Compare lenght of duration time, but if less to 10 character then resume pause time
                        if(value.length>10){
                            initTimer(element,duration,$("#button"+index));
                            $("#button"+index).removeClass("btn-primary").addClass("btn-danger").text('@lang('messages.button_practice_finish')');
                            $("#button"+index).attr("data-status", "1");
                        }else{
                            element.text(value);
                            $("#button"+index).removeClass("btn-primary").addClass("disabled btn-danger").text('@lang('messages.button_finished_practice')');
                            $("#button"+index).attr("data-status", "2");
                        }
                    }
                });
                }
            }
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('/exercise') }}">@lang('messages.title_exercise')</a></li>
    <li>{{ $exercise->name }} @isset($exercise->description) ({{ $exercise->description }}) @endisset</li>
@endsection

@section('content')
    <div class="row">
    @include('layouts.message')
        @foreach($exercise->stages as $stage)
            <div class="col-md-12">
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><i class="icos-paragraph-justify"></i></div>
                        <h2>{{ $stage->name }} @lang('messages.table') #{{ $stage->pivot->table_id }}</h2>
                        <ul class="buttons">                                                        
                            <li><a href="#" title="@lang('messages.minimize_window')" class="cblock"><span class="icos-menu"></span></a></li>
                        </ul>
                        <ul class="buttons">                                     
                            <li><a href="" data-table_id="{{ $stage->pivot->table_id }}" title="@lang('messages.end_table')"><span class="icos-exit"></span></a></li>
                        </ul> 
                    </div>                        
                    <div class="block accordion" data-collapse="eblock_1">
                        @if(count($stage->practices) > 0)
                            @foreach ($stage->practices as $practice)
                            <h3>{{ $practice->name }}</h3>
                            <div class="widget">
                                <div class="block invoice">
                                    <!-- General -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">@lang('messages.name')</th>
                                                        <th width="20%">@lang('messages.duration')</th>
                                                        <th width="20%">@lang('messages.unit_type')</th>
                                                        <th width="20%">@lang('messages.error_type')</th>
                                                        <th width="20%">@lang('messages.student')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h1>{{ $practice->name }} #{{ $practice->id }}</h1></td>
                                                        <td><h1 id="{{ $stage->pivot->table_id }}{{ $practice->id }}">{{ $practice->duration }}</h1></td>
                                                        <td><h1>{{ $practice->unitType->name }}</h1></td>
                                                        <td><h1>{{ $practice->errorType->name }}</h1></td>
                                                        <td><h1>
                                                            {{ $stage->users()->where('exercise_id',$exercise->id)->get()->first()->degree->abbreviation }}
                                                            {{ $stage->users()->where('exercise_id',$exercise->id)->get()->first()->names }}
                                                            {{ $stage->users()->where('exercise_id',$exercise->id)->get()->first()->lastnames }}
                                                            </h1></td>
                                                    </tr>                                    
                                                </tbody>
                                            </table>     
                                            <span class="date">{{ $stage->pivot->date_time }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Material/Tool/Instrument -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>@lang('messages.material')</h4>
                                            @forelse ($practice->materials as $material)
                                                <address>
                                                    <strong>{{ $material->name }}</strong><br>
                                                    {{ $material->description }}<br>
                                                </address>
                                            @empty
                                                <p>@lang('messages.dont_exists_information')</p>
                                            @endforelse
                                        </div>
                                        <div class="col-md-4">
                                            <h4>@lang('messages.instrument')</h4>
                                            @forelse ($practice->instruments as $instrument)
                                                <address>
                                                    <strong>{{ $instrument->name }}</strong><br>
                                                    {{ $instrument->description }}<br>
                                                </address>
                                            @empty
                                                <p>@lang('messages.dont_exists_information')</p>
                                            @endforelse                              
                                        </div>
                                        <div class="col-md-4">
                                            <h4>@lang('messages.tool')</h4>
                                            @forelse ($practice->tools as $tool)
                                                <address>
                                                    <strong>{{ $tool->name }}</strong><br>
                                                    {{ $tool->description }}<br>
                                                </address>
                                            @empty
                                                <p>@lang('messages.dont_exists_information')</p>
                                            @endforelse 
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    </div>
                                    
                                    <!-- Knowledge/Objetives -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>@lang('messages.knowledge')</h4>
                                            @forelse ($practice->knowledge as $knowledg)
                                                <address>
                                                    <strong>{{ $knowledg->name }}</strong><br>
                                                    {{ $knowledg->description }}<br>
                                                </address>
                                            @empty
                                                <p>@lang('messages.dont_exists_information')</p>
                                            @endforelse 
                                        </div>
                                        <div class="col-md-6">
                                            <h4>@lang('messages.objective')</h4>
                                            @forelse ($practice->objectives as $objective)
                                                <address>
                                                    <strong>{{ $objective->name }}</strong><br>
                                                    {{ $objective->description }}<br>
                                                </address>
                                            @empty
                                                <p>@lang('messages.dont_exists_information')</p>
                                            @endforelse 
                                        </div>
                                    </div>
                                    
                                    <!-- Activities/Solutions -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>@lang('messages.activitie')/@lang('messages.solution')</h4>
                                            <address>
                                            <ol>
                                        @forelse ($practice->activities as $activitie)
                                            <li><strong>{{ $activitie->name }} : {{ $activitie->description }}</strong></li>
                                            <ul>
                                            @foreach ($activitie->solutions as $solution)
                                                <li>{{ $solution->name }} : {{ $solution->description }}</li>
                                                @break;
                                            @endforeach
                                            </ul>
                                            <div class="dr"><span></span></div>
                                        @empty
                                            <p>@lang('messages.dont_exists_information')</p>
                                        @endforelse   
                                            </ol>
                                             </address>
                                        </div>
                                    </div>
                                    
                                    <!-- Actions -->
                                    <div class="row">
                                        <h4>@lang('messages.actions')</h4>
                                        <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <span class="top title">Sensores : </span>
                                                    @forelse ($practice->sensors as $sensor)
                                                        <button class="btn btn-danger" data-error="0" data-table_id="{{ $stage->pivot->table_id }}" data-toggle="button" title="@lang('messages.enable_disabled')" type="button"><span class="glyphicon glyphicon-off tipb"></span> {{ $sensor->name }}</button>
                                                    @empty
                                                        <p>@lang('messages.dont_exists_actions_to_manipulate')</p>
                                                    @endforelse                                 
                                                </div>

                                                <div class="col-md-4">
                                                    <span class="top title">Fallas Sedam : </span> 
                                                    @forelse ($practice->sedamFails as $sedamFail)
                                                        <button type="button" data-file_name="{{ $sedamFail->file_name }}" data-module_name="{{ $sedamFail->module_name }}" data-error="1" data-table_id="{{ $stage->pivot->table_id }}" data-ip_address="{{ $practice->unitType->ipAddress->ip }}" data-unit="{{ $practice->unitType->abbreviation }}" data-topic="{{ $sedamFail->topic }}"  title="{{ $sedamFail->description }}" class="btn btn-warning">{{ $sedamFail->name }}</button>
                                                    @empty
                                                        <p>@lang('messages.dont_exists_actions_to_manipulate')</p>
                                                    @endforelse
                                                </div>
                                        
                                                <div class="col-md-4">
                                                    <span class="top title">Fallas Moxa : </span> 
                                                    @forelse ($practice->moxaFails as $moxaFail)
                                                        <button type="button" data-topic="{{ $moxaFail->topic }}"  data-error="2" data-table_id="{{ $stage->pivot->table_id }}" data-sensor="{{ $moxaFail->sensor }}" title="{{ $moxaFail->description }}" class="btn btn-warning">{{ $moxaFail->name }}</button>
                                                    @empty
                                                        <p>@lang('messages.dont_exists_actions_to_manipulate')</p>
                                                    @endforelse
                                                </div>
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    <br/>
                                    <br/>  
                                    <!-- Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button id="button{{ $stage->pivot->table_id }}{{ $practice->id }}" data-table_id="{{ $stage->pivot->table_id }}" data-practice_id="{{ $practice->id }}" data-status="0" class="btn btn-default btn-lg btn-block btn-primary" data-exercise_id="{{ $exercise->id }}" data-user_id="{{ $stage->users()->where('exercise_id',$exercise->id)->get()->first()->id }}" type="button">@lang('messages.start_practice')</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3><strong>@lang('messages.empty_practices')</strong></h3>
                        @endif
                    </div>
                </div>
                <div class="dr"><span></span></div> 
            </div>
        @endforeach             
    </div>
@endsection