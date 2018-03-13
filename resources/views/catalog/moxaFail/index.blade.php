@extends('layouts.app')
@section('title', 'Fallas MOXA')
@section('js')
    <script>
        $(document).ready(function(){
            $("a,button,span").tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });

            // table sedam fails
            $('#moxa_fails_table').dataTable({
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
    <li><a href="{{ url('catalog') }}">@lang('messages.title_catalog')</a></li>
    <li>@lang('messages.title_moxa_fail')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.title_moxa_fail')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("moxa_fail/create") }}" title="Crear Falla MOXA"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="moxa_fails_table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">@lang('messages.tr_name')</th>
                                    <th width="20%">@lang('messages.description')</th>
                                    <th width="15%">@lang('messages.topic')</th>
                                    <th width="15%">@lang('messages.sensor')</th>
                                    <th width="15%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($moxaFails as $moxaFail)
                                    <tr>
                                    <td>{{ $moxaFail->name }}</td>
                                    <td>{{ $moxaFail->description }}</td>
                                    <td>{{ $moxaFail->topic }}</td>
                                    <td>{{ $moxaFail->sensor }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['moxa_fail.destroy',$moxaFail],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este falla MOXA?');"]) !!}
                                            <a href="{{ route('moxa_fail.edit',$moxaFail) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <button class="icon-button btn btn-link" title="Eliminar" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
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