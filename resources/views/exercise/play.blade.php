@extends('layouts.app')
@section('title', 'Reproduciendo')
@section('js')
    <script>
        $(document).ready(function(){

            // config ajax
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            var cookies = {};
            var date = Date();
            //var date = new Date("November 26, 2017 18:28:00");
            //console.log("new Date "+ date);
            if(Cookies.get('durations')){
                $.each(JSON.parse(Cookies.get('durations')), function (index, value) {
                    cookies[index] =  value; 
                    //console.log("timestamp "+index+" "+value);
                    var differenceNowVsInitPractice = Math.abs(Date.parse(date)-Date.parse(value));
                    var dateNowVsInitPractice = new Date(differenceNowVsInitPractice);
                    //console.log(parseMillisecondsIntoReadableTime(dateNowVsInitPractice.getTime()));

                    var d = new moment(parseMillisecondsIntoReadableTime(dateNowVsInitPractice.getTime()),'hh:mm:ss');
                    //console.log("moment"+d+d.local().toDate());
                    //console.log(sd_2.getHours());
                    //console.log(sd_2.getHours()+":"+sd_2.getMinutes()+":"+sd_2.getSeconds());
                    //console.log("a "+sd_2.toUTCString().replace("UTC","GMT"));
                    //console.log("b "+sd_2.getHours());
                    //console.log("c "+sd_2.getMinutes());
                    //console.log($('#'+index).text());
                    var d2 = new moment($('#'+index).text(),'hh:mm:ss');
                    //console.log("moment"+d2+d2.local().toDate());


                    /**/
                    //console.log("-a-a-"+Math.abs(d.local().toDate()-d2.local().toDate()));
                    var sd_3 = new Date(Math.abs(d.local().toDate()-d2.local().toDate()));
                    //console.log(sd_3);
                    //console.log(parseMillisecondsIntoReadableTime(sd_3.getTime()));
                    var timeOut = new moment(parseMillisecondsIntoReadableTime(sd_3.getTime()),'hh:mm:ss');
                    /**/
                    if(d > d2){
                        alert("Se finalizalo el tiempo de la práctica #"+index.charAt(1)+" de la mesa "+index.charAt(0));
                        $("#button"+index).addClass("disabled");
                    }else{
                        var element = $('#'+index);
                        var duration = parseMillisecondsIntoReadableTime(sd_3.getTime()).replace(":","h");
                        duration = duration.replace(":","m");
                        duration += "s";
                        initTimer(element,duration,$("#button"+index));
                        $("#button"+index).addClass("disabled");
                    }
                    /*var str         = $('#'+index).text();
                    str=str.replace(":","h");
                    str=str.replace(":","m");
                    alert(str);*/
                    /*var timePractice = new Date(Number($('#'+index).text().split(":")[0]) * 3600000);
                    console.log(timePractice);
                    console.log(((timePractice - sd_2)));
                    if ((timePractice - sd_2) >= 0) {   
                        var element = $('#'+index);
                        var duration = $('#'+index).text();
                        //initTimer(element,parseMillisecondsIntoReadableTime(sd_2.getTime()),element);
                    }*/
                });
            }

            

            $( "button" ).tooltip({
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

            $('button').on('click',function(event) {
                event.stopPropagation(); // prevent default bootstrap behavior
                var tableId = $(this).attr('data-table_id');
                var practiceId = parseInt($(this).attr('data-practice_id'));
                var sensorName = $(this).text();
                var status = $(this).attr('data-status');
                var errorType = parseInt($(this).attr("data-error"));

                if(status >= 0){
                    var element = $('#'+tableId+practiceId);//$(this).parents('.block, .accordion').find("tbody tr td:eq(1) h1").get(practiceId-1);
                    var duration = $('#'+tableId+practiceId).text(); //$(this).parents('.block, .accordion').find("tbody tr td:eq(1) h1").eq(practiceId-1).text();
                    if(status == 0){
                         if(confirmed()){
                            cookies[tableId+practiceId] = Date();
                            Cookies.set('durations', cookies);
                            $(this).removeClass("btn-primary").addClass("btn-danger").text("Finalizar Práctica");
                            initTimer(element,(duration.substr(0,2)+'h'),$(this));
                            $(this).attr("data-status", "1");
                        }
                    }else if(status == 1){
                        $(this).addClass("disabled");
                        endTimer(element);
                        $(this).attr("data-status", "2");
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
                    var objectSendKinematic = {};
                        objectSendKinematic.idMesa = tableId;
                    switch(errorType) {
                        case 0:
                            objectSendKinematic.sensor = sensorName;
                            objectSendKinematic.active = enable;
                            actions(objectSendKinematic);  
                            break;
                        case 1:
                            var topic = $(this).attr('data-topic');
                            console.log(topic);
                            actions(objectSendKinematic);
                            break;
                        case 2:
                            var topic = $(this).attr('data-topic');
                            objectSendKinematic.moxaType = 'INTERNAL';
                            actions(objectSendKinematic);
                            break;
                    } 
                }
            });

            function confirmed(){
                var pass = confirm("¿Está seguro de iniciar la práctica?");
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
                        $(elementButton).addClass("disabled");
                    }, // If duration is set, this function is called after `duration` has elapsed
                    repeat:     false,     // If duration is set, `callback` will be called repeatedly
                    format:     '%H:%M:%S'    // Format to show time in
                });
                console.log(Cookies.get('durations'));
            }

            function endTimer(element){
                Cookies.remove('name');
                $(element).timer('pause');
            }
            
            function actions(objectSendKinematic){
                $.ajax({
                    url: "{{ url('send_kinect') }}",
                    type : "GET",
                    data: objectSendKinematic,
                    dataType : 'text',
                    success : function(json) {
                        console.log(json);
                    },
                    error : function(xhr, status) {
                    },
                    complete : function(xhr, status) {
                    }
                });
            }
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('/exercise') }}">@lang('messages.title_exercise')</a></li>
    <li>{{ $exercise->name }} ({{ $exercise->description }})</li>
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
                            <li><a href="#" class="cblock"><span class="icos-menu"></span></a></li>
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
                                            @foreach ($practice->materials as $material)
                                                <address>
                                                    <strong>{{ $material->name }}</strong><br>
                                                    {{ $material->description }}<br>
                                                </address>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4">
                                            <h4>@lang('messages.instrument')</h4>
                                            @foreach ($practice->instruments as $instrument)
                                                <address>
                                                    <strong>{{ $instrument->name }}</strong><br>
                                                    {{ $instrument->description }}<br>
                                                </address>
                                            @endforeach                              
                                        </div>
                                        <div class="col-md-4">
                                            <h4>@lang('messages.tool')</h4>
                                            @foreach ($practice->tools as $tool)
                                                <address>
                                                    <strong>{{ $tool->name }}</strong><br>
                                                    {{ $tool->description }}<br>
                                                </address>
                                            @endforeach

                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    </div>
                                    
                                    <!-- Knowledge/Objetives -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>@lang('messages.knowledge')</h4>
                                            @foreach ($practice->knowledge as $knowledg)
                                                <address>
                                                    <strong>{{ $knowledg->name }}</strong><br>
                                                    {{ $knowledg->description }}<br>
                                                </address>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            <h4>@lang('messages.objective')</h4>
                                            @foreach ($practice->objectives as $objective)
                                                <address>
                                                    <strong>{{ $objective->name }}</strong><br>
                                                    {{ $objective->description }}<br>
                                                </address>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <!-- Activities/Solutions -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>@lang('messages.activitie')/@lang('messages.solution')</h4>
                                            <address>
                                            <ol>
                                        @foreach ($practice->activities as $activitie)
                                            <li><strong>{{ $activitie->name }} : {{ $activitie->description }}</strong></li>
                                            <ul>
                                            @foreach ($activitie->solutions as $solution)
                                                <li>{{ $solution->name }} : {{ $solution->description }}</li>
                                                @break;
                                            @endforeach
                                            </ul>
                                            <div class="dr"><span></span></div>
                                        @endforeach  
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
                                                    @foreach ($practice->sensors as $sensor)
                                                        <button class="btn btn-danger" data-error="0" data-table_id="{{ $stage->pivot->table_id }}" data-toggle="button" title="@lang('messages.enable_disabled')" type="button"><span class="glyphicon glyphicon-off tipb"></span> {{ $sensor->name }}</button>
                                                    @endforeach                                       
                                                </div>

                                                <div class="col-md-4">
                                                    <span class="top title">Fallas Sedam : </span> 
                                                    @foreach ($practice->sedamFails as $sedamFail)
                                                        <button type="button" data-topic="{{ $sedamFail->script }}" data-error="1" data-table_id="{{ $stage->pivot->table_id }}" title="{{ $sedamFail->description }}" class="btn btn-warning">{{ $sedamFail->name }}</button>
                                                    @endforeach
                                                </div>
                                        
                                                <div class="col-md-4">
                                                    <span class="top title">Fallas Moxa : </span> 
                                                    @foreach ($practice->moxaFails as $moxaFail)
                                                        <button type="button" data-topic="{{ $moxaFail->topic }}" data-error="2" data-table_id="{{ $stage->pivot->table_id }}" title="{{ $moxaFail->description }}" class="btn btn-warning">{{ $moxaFail->name }}</button>
                                                    @endforeach
                                                </div>
                                        </div>
                                    </div>
                                    
                                    <br/>
                                    <br/>
                                    <br/>  
                                    <!-- Start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button id="button{{ $stage->pivot->table_id }}{{ $practice->id }}" data-table_id="{{ $stage->pivot->table_id }}" data-practice_id="{{ $practice->id }}" data-status="0" class="btn btn-default btn-lg btn-block btn-primary" type="button">@lang('messages.start_practice')</button>  
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