@extends('layouts.app')


@section('title', 'Ejercicios')
@section('js')
    <script>
        
        $(document).ready(function(){
            $("a,button,span").tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });
            $('#exercises_table').dataTable({
                "bPaginate": true,
                "bSort": true,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "{{ asset('js/plugins/datatables/Spanish.js') }}"
                }
            });

            $("#stopExercise").click(function(){
                if (!confirm('@lang('messages.question_end_exercise')')){
                    return false;
                }else{
                   removeAllCookies();
                }
            });

            $("#restartExercise").click(function(){
                if (!confirm('@lang('messages.question_restart_exercise')')){
                    return false;
                }else{
                   removeAllCookies();
                }
            });
            

            function removeAllCookies(){
                Cookies.remove('durations');
                var url = $(this).attr('href');
                window.open(url,"_self");
                return false;
            }
            

            /*$('#playExercise').on('click',function(event) { 
                // Some Function 
                event.preventDefault();
                event.stopPropagation();
                var url = $(this).attr('href'); // Get url from the <a> href attribute  
                alert(url);
                window.open(url,"_self"); // Open the url in the current window. Set to "_blank" instead of "_self" to open in a new window.

                event.preventDefault(); // Prevent default action (e.g. following the link)
                return false;
            });*/
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_exercise')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
               @include('layouts.message') 
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-bookmark"></span></div>
                        <h2>@lang('messages.title_exercise')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("exercise/create") }}" title="@lang('messages.create_exercise')"><span class="icos-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table  id="exercises_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="40%">@lang('messages.tr_name')</th>
                                        <th width="40%">@lang('messages.tr_description')</th>
                                        <th width="20%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exercises as $exercise)
                                        <tr>
                                        <td>{{ $exercise->name }}</td>
                                        <td>{{ $exercise->description }}</td>
                                        <td class="TAC">
                                            @if($exercise->status == 0)
                                            {!! Form::open(['route' => ['exercise.destroy',$exercise],'method' => 'DELETE']) !!}
                                                 <a href="{{ route('exercise.show',['exercise' => $exercise->id]) }}" class="icon-button" onclick="if (! confirm('@lang('messages.question_start_exercise')')) { return false; }" title="@lang('messages.tooltip_start_exercise')"><span class="glyphicon glyphicon-play"></span></a>                    
                                                <button class="icon-button btn btn-link" title="@lang('messages.tooltip_delete_exercise')" onclick="if (! confirm('@lang('messages.question_delete_exercise')')) { return false; }" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                            {!!Form::close()!!}

                                            @elseif($exercise->status == 1)
                                                <a id="stopExercise" href="{{ route('exercise.show',['exercise' => $exercise->id]) }}" class="icon-button" title="@lang('messages.end2_exercise')" ><span class="glyphicon glyphicon-stop"></span></a>
                                                <a href="{{ route('exercise.show',['exercise' => $exercise,'play' => 1]) }}" class="icon-button" title="@lang('messages.see_exercise')"><span class=" glyphicon glyphicon-eye-open"></span></a>
                                                <a id="restartExercise" href="{{ route('exercise.show',['exercise' => $exercise,'restart' => 1]) }}" class="icon-button" title="@lang('messages.tooltip_restart_exercise')"><span class="glyphicon glyphicon-refresh"></span></a>
                                            @elseif($exercise->status == 2)
                                                <a href="{{ route('exercise.show',['exercise' => $exercise->id]) }}" class="icon-button" title="@lang('messages.info_see_exercise')"><span class="glyphicon glyphicon-info-sign"></span></a>
                                            @endif
                                        </td>
                                    </tr>   
                                    @endforeach                          
                                </tbody>
                            </table>                    
                        </div> 
                </div>                         
            </div>
    </div>
@endsection