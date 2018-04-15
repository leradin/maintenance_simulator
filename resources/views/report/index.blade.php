@extends('layouts.app')
@section('title', 'Reportes')
@section('js')
    <script>
        $(document).ready(function(){
            /*
            *Config Ajax request
            */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*
            * Tooltip
            */
            $("a,button,span").tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });

            /*
            * Initialize var for child table
            */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            var textnode = document.createTextNode('');
            nCloneTh.appendChild(textnode);
            nCloneTd.innerHTML = '<img src="{{ asset('img/icons/alerts/sign_add.png') }}">';
            nCloneTd.className = "center";
            $(".wrapper_search_by").hide();
            $("#div1").show();

            /*
            *Initialse DataTables, with no sorting on the 'details' column
            */
            var table = $('#example').dataTable({
                "oLanguage": {
                    "sUrl": "{{ asset('js/plugins/datatables/Spanish.js') }}"
                },
                "bPaginate": true,
                "bSort": true,
                "sSearch" : true,
                "bRetrieve": true,
                "aaSorting": [[1, 'asc']]
                /*bFilter: true, 
                bInfo: true, 
                bPaginate: true, 
                bLengthChange: false,                                                                
                bSort: true,
                bAutoWidth: true,
                "aoColumnDefs": [
                    {   "bSortable": false,
                        "aTargets": [ -1 , 0]
                    }
                ]*/
            });
    

            /* Get ajax for stages */
            function getStages(idExercise){
                var sOut = $.ajax({
                  url: "{{ action('ReportController@show') }}",
                  async: false, 
                  data: {exercise_id : idExercise },
                  dataType : 'json',
                  success: function(data) {
                      return data;            
                  }
                });
                return sOut.responseText; 
            }

            /* Formating function for row details */
            function fnFormatDetails ( oTable, nTr, idExercise ){
                var aData = JSON.parse(getStages(idExercise));
                var sOut = '<table cellspacing="0" border="0" width="100%">';
                sOut += '<tr><th>Escenario</th><th>Descripción</th><th>Estudiante</th><th>Practicas</th></tr>';
                $.each(aData.stages,function(key,value) {
                    sOut += '<tr><td>'+value.name+':</td><td>'+value.description+'</td>';
                    sOut += '<td>';
                    $.each(value.student,function(key2,value2) {
                        sOut += value2.full_name;
                    });
                    sOut += '</td>';
                    sOut += '<td><ul>';
                    $.each(value.practices,function(key3,value3) {
                        sOut += '<li>'+value3.name;
                        sOut += '<br /> R = <b>'+value3.extra.answer +'</b></br /> S = <font '+(value3.extra.score ? "color=green>Aprobo" : "color=red>No Aprobo")+'</font>';
                        sOut += '<br /> Calificado por = '+
                            (value3.extra.evaluator.names ? (value3.extra.evaluator.names+" "+value3.extra.evaluator.lastnames) : "Pendiente de Calificar");
                        sOut +='</li>';
                    });
                    sOut += '</ul></td></tr>';
                });
                sOut += '</table>';
                return sOut;
            }
 
            $('#example thead tr').each( function () {
                //var rows = table.fnGetData(this);
                //if(rows !== null)
                    this.insertBefore( nCloneTh, this.childNodes[0] );
            });
             
            $('#example tbody tr').each( function () {
                //var rows = table.fnGetData(this);
                //if(rows !== null)
                    this.insertBefore(nCloneTd.cloneNode( true ), this.childNodes[0] );
            });

            
     
    

            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */
            $('#example tbody td img').on('click', function () {
                try{
                    var nTr = $(this).parents('tr')[0];
                    var idExercise = $(nTr).children()[1].innerHTML;
                    if ( table.fnIsOpen(nTr) )
                    {
                        /* This row is already open - close it */
                        this.src = "{{ asset('img/icons/alerts/sign_add.png') }}";
                        table.fnClose( nTr );
                    }else{
                        /* Open this row */
                        this.src = "{{ asset('img/icons/alerts/sign_remove.png') }}";
                        table.fnOpen( nTr, fnFormatDetails(table, nTr,idExercise), 'details' );
                    }
                }catch(err) {
                }    
            });
            // Radio
            $("input[name=search_by]").on("click",function () {
                $(".wrapper_search_by").hide();
                $("#div"+$(this).val()).show();
            });        
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_report')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-article"></span></div>
                        <h2>@lang('messages.menu_report')</h2>                         
                    </div>
                    <div class="toolbar">
                        <div class="left TAL">
                           
                                <form id="validate" name="validate" action="{{ url('report') }}">
                                    <div id="div1" class="wrapper_search_by">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <input type="text" readonly name="start_date" class="form-control validate[required]" id="datepicker" placeholder="@lang('messages.start_date')" />

                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <input type="text" readonly name="finish_date" class="form-control validate[required]" id="datepicker2" placeholder="@lang('messages.finish_date')" />                                
                                            <div class="input-group-btn">
                                                <button class="btn btn-default">@lang('messages.search')</button>                                    
                                            </div>
                                        </div>   
                                    </div>
                                    <div id="div2" class="wrapper_search_by">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                                            <input type="text" name="exercise" class="form-control validate[required]" id="datepicker2" placeholder="@lang('messages.exercise')" />
                                            <div class="input-group-btn">
                                                <button class="btn btn-default">@lang('messages.search')</button>                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="div3" class="wrapper_search_by">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input type="text"  name="student" class="form-control validate[required]" id="datepicker2" placeholder="@lang('messages.student')" />
                                            <div class="input-group-btn">
                                                <button class="btn btn-default">@lang('messages.search')</button>                                    
                                            </div>
                                        </div>
                                    </div>
                                </form>                     
                        </div>
                        <div class="right TAR">    
                            <div class="btn-group" data-toggle="buttons-radio">
                                @lang('messages.date')
                                {{ old('search_by') }}
                                <input type="radio" name="search_by" value="1" checked="checked" />
                                @lang('messages.exercise')
                                <input type="radio" name="search_by" value="2" />
                                @lang('messages.student') 
                                <input type="radio" name="search_by" value="3" />                           
                            </div>           
                        </div>
                    </div>
                    <div class="block white">               
                            <table class="table" id="example" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">@lang('messages.tr_id')</th>
                                        <th width="40%">@lang('messages.tr_exercise_name')</th>
                                        <th width="40%">@lang('messages.tr_description')</th>
                                        <th width="15%" class="TAC">@lang('messages.tr_actions')</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exercises as  $exercise)
                                        <tr>
                                            <td>{{ $exercise->id }}</td>
                                            <td>{{ $exercise->name }}</td>
                                            <td>{{ $exercise->description }}</td>
                                            <td class="TAC">
                                                <a href="{{ action('ReportController@pdf',$exercise->id) }}" class="icon-button" title="@lang('messages.report_print')"><span class="glyphicon icosg-file-pdf"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach          
                                </tbody>
                            </table>                  
                    </div>            
                    <div class="toolbar-fluid">
    
                    </div>
                </div>
    </div>
</div>
@endsection
@section('modal')
     @include('layouts.modal')
@endsection
                                    
                                   