@extends('layouts.app')
@section('title', 'Objetivos')
@section('js')
    <script>
        $(document).ready(function(){
            $("a,button,span").tooltip({
                show: {
                    effect: "slideDown",
                    delay: 250
                }
            });

            // table objectives
            $('#objectives_table').dataTable({
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
    <li>@lang('messages.title_objective')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.title_objective')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("objective/create") }}" title="Crear Objetivo"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="objectives_table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="40%">@lang('messages.tr_name')</th>
                                    <th width="50%">@lang('messages.description')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($objectives as $objective)
                                    <tr>
                                    <td>{{ $objective->name }}</td>
                                    <td>{{ $objective->description }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['objective.destroy',$objective],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este objetivo?');"]) !!}
                                            <a href="{{ route('objective.edit',$objective) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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