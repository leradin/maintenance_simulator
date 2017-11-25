@extends('layouts.app')
@section('title', 'Usuarios')
@section('js')
    <script>
        $(document).ready(function(){
            $( "button,span" ).tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });
            $('#users_table').dataTable({
                "bPaginate": true,
                "bSort": true,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "{{ asset('js/plugins/datatables/Spanish.js') }}"
                }
            });
        });
    </script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.title_user')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
                @include('layouts.message') 
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-user1"></span></div>
                        <h2>@lang('messages.title_user')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("user/create") }}"><span class="icos-plus" title="@lang('messages.title_create_user')"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table id="users_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
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
                                        <td>{{ $user->enrollment }}</td>
                                        <td>{{ $user->names }}</td>
                                        <td>{{ $user->lastnames }}</td>
                                        <td>{{ $user->degree->name }}</td>
                                        <td>{{ $user->ascription->name }}</td>
                                        <td class="TAC dark">
                                            @if($user->user)
                                                <span class="icosg-user1" title="Sistema"></span>
                                            @else
                                                <span class="icosg-user2" title="Estudiante"></span>
                                            @endif 
                                        </td>
                                        <td class="TAC">
                                            {!! Form::open(['route' => ['user.destroy',$user],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este usuario?');"]) !!}
                                                <button title="Eliminar" class="icon-button btn btn-link" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                            {!!Form::close()!!}
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