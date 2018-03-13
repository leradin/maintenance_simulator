@extends('layouts.app')
@section('title', 'Usuarios')
@section('js')
    <script>
        $(document).ready(function(){
            $( "button,span,a" ).tooltip({
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
                                        <th width="15%">@lang('messages.tr_names')</th>
                                        <th width="10%">@lang('messages.tr_lastnames')</th>
                                        <th width="15%">@lang('messages.tr_degree')</th>
                                        <th width="20%">@lang('messages.tr_ascription')</th>
                                        <th width="10%">@lang('messages.tr_type')</th>
                                        <th width="10%">@lang('messages.tr_created_at')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        @if(auth()->user() != $user)
                                        <tr>
                                            <td>{{ $user->enrollment }}</td>
                                            <td>{{ $user->names }}</td>
                                            <td>{{ $user->lastnames }}</td>
                                            <td>{{ $user->degree->name }}</td>
                                            <td>{{ $user->ascription->name }}</td>
                                            <td class="TAC dark">
                                                @if($user->user)
                                                    <span class="icosg-user1" title="@lang('messages.text_system')"></span>@lang('messages.text_system')
                                                @else
                                                    <span class="icosg-user2" title="@lang('messages.text_student')"></span>@lang('messages.text_student')
                                                @endif 
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class="TAC">
                                                @if (!$user->user)
                                                    {!! Form::open(['route' => ['user.destroy',$user],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este usuario?');"]) !!}
                                                        <a href="{{ route('user.edit',$user) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
                                                        <button title="@lang('messages.button_delete')" class="icon-button btn btn-link" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                                    {!!Form::close()!!}
                                                @else
                                                    @lang('messages.not_permission')
                                                @endif
                                            </td>
                                        </tr>
                                        @endif   
                                    @endforeach                          
                                </tbody>
                            </table>                    
                        </div> 
                </div>                         
            </div>
    </div>
@endsection