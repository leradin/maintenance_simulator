@extends('layouts.app')


@section('title', 'Estudiantes')
@section('js')
    <script>
        $(document).ready(function(){
            $('#students_table').dataTable({
                "bPaginate": true,
                "bSort": true,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_student')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="head">
                        <div class="icon"><span class="icosg-user3"></span></div>
                        <h2>@lang('messages.title_student')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("student/create") }}"><span class="icosg-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table id="students_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="10%">@lang('messages.tr_enrollment')</th>
                                        <th width="20%">@lang('messages.tr_names')</th>
                                        <th width="20%">@lang('messages.tr_lastnames')</th>
                                        <th width="20%">@lang('messages.tr_degree')</th>
                                        <th width="20%">@lang('messages.tr_ascription')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                        <td><input type="checkbox" name="order[]" value="528"/></td>
                                        <td><a href="#">{{ $student->enrollment }}</a></td>
                                        <td>{{ $student->names }}</td>
                                        <td>{{ $student->lastnames }}</td>
                                        <td>{{ $student->degree->name }}</td>
                                        <td>{{ $student->ascription->name }}</td>
                                        <td class="TAC">
                                            <!--a href="#" class="icon-button"><span class="glyphicon glyphicon-ok"></span></a> 
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a-->
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-trash"></span></a>
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