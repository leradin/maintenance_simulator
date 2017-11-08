@extends('layouts.app')


@section('title', 'Ejercicios')
@section('js')
    <script>
        $(document).ready(function(){
            $('#exercises_table').dataTable({
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
    <li>@lang('messages.title_exercise')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
               @include('layouts.message') 
                <div class="widget">
                    <div class="head">
                        <div class="icon"><span class="icosg-file"></span></div>
                        <h2>@lang('messages.title_exercise')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("exercise/create") }}"><span class="icosg-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table  id="exercises_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="40%">@lang('messages.tr_name')</th>
                                        <th width="40%">@lang('messages.tr_description')</th>
                                        <th width="20%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($exercises as $exercise)
                                        <tr>
                                        <td><input type="checkbox" name="order[]" /></td>
                                        <td>{{ $exercise->name }}</td>
                                        <td>{{ $exercise->description }}</td>
                                        <td class="TAC">
                                            @if($exercise->status == 0)
                                            {!! Form::open(['route' => ['exercise.destroy',$exercise],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este ejercicio?');"]) !!}
                                                 <a href="{{ route('exercise.show',['exercise' => $exercise->id]) }}" class="icon-button"><span class="glyphicon glyphicon-play"></span></a>                    
                                                <button class="icon-button btn btn-link" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                            {!!Form::close()!!}
                                            @elseif($exercise->status == 1)
                                                <a href="{{ route('exercise.show',['exercise' => $exercise->id]) }}" class="icon-button"><span class="glyphicon glyphicon-stop "></span></a>
                                            @else
                                                <a href="{{ route('exercise.show',['exercise' => $exercise->id]) }}" class="icon-button"><span class="glyphicon glyphicon-info-sign"></span></a>
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