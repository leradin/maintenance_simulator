@extends('layouts.app')


@section('title', 'Usuarios')
@section('js')
    <script>
        $(document).ready(function(){
            $('#users_table').dataTable({
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
    <li><a href="{{ url('/home') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_user')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
                @include('layouts.message') 
                <div class="widget">
                    <div class="head">
                        <div class="icon"><span class="icosg-user1"></span></div>
                        <h2>@lang('messages.title_user')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("user/create") }}"><span class="icosg-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table id="users_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="10%">@lang('messages.tr_enrollment')</th>
                                        <th width="20%">@lang('messages.tr_names')</th>
                                        <th width="20%">@lang('messages.tr_lastnames')</th>
                                        <th width="20%">@lang('messages.tr_degree')</th>
                                        <th width="20%">@lang('messages.tr_ascription')</th>
                                        <th width="10%">@lang('messages.tr_type')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                        <td><input type="checkbox" name="order[]" value="528"/></td>
                                        <td><a href="#">{{ $user->enrollment }}</a></td>
                                        <td>{{ $user->names }}</td>
                                        <td>{{ $user->lastnames }}</td>
                                        <td>{{ $user->degree->name }}</td>
                                        <td>{{ $user->ascription->name }}</td>
                                        <td>
                                            @if($user->user)
                                                <span class="label label-info">Sistema</span>
                                            @else
                                                <span class="label label-success">Estudiante</span>
                                            @endif 
                                        </td>
                                        <td class="TAC">
                                            {!! Form::open(['route' => ['user.destroy',$user],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este usuario?');"]) !!}
                                                <button class="icon-button btn btn-link" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                            {!!Form::close()!!}
                                            <!--a href="#" class="icon-button"><span class="glyphicon glyphicon-ok"></span></a> 
                                            <a href="#" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a-->
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