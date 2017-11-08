@extends('layouts.app')


@section('title', 'Practicas')
@section('js')
    <script>
        $(document).ready(function(){
            $('#practices_table').dataTable({
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
    <li>@lang('messages.title_practice')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
               @include('layouts.message') 
                <div class="widget">
                    <div class="head">
                        <div class="icon"><span class="icosg-newspaper"></span></div>
                        <h2>@lang('messages.title_practice')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("practice/create") }}"><span class="icosg-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table  id="practices_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="30%">@lang('messages.tr_name')</th>
                                        <th width="20%">@lang('messages.tr_duration')</th>
                                        <th width="20%">@lang('messages.tr_error_type')</th>
                                        <th width="20%">@lang('messages.tr_unit_type')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($practices as $practice)
                                        <tr>
                                        <td><input type="checkbox" name="order[]" /></td>
                                        <td><a href="#">{{ $practice->name }}</a></td>
                                        <td>{{ $practice->duration }}</td>
                                        <td>{{ $practice->errorType->name }}</td>
                                        <td>{{ $practice->unitType->name }}</td>
                                        <td class="TAC">
                                            {!! Form::open(['route' => ['practice.destroy',$practice],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar esta práctica?');"]) !!}
                                                <button class="icon-button btn btn-link" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
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