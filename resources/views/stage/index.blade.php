@extends('layouts.app')


@section('title', 'Escenarios')
@section('js')
    <script>
        $(document).ready(function(){
            $('#stages_table').dataTable({
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
    <li>@lang('messages.title_stage')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
               @include('layouts.message') 
                <div class="widget">
                    <div class="head">
                        <div class="icon"><span class="icosg-bookmark"></span></div>
                        <h2>@lang('messages.title_stage')</h2>
                        <ul class="buttons">
                            <li><a href="{{ url("stage/create") }}"><span class="icosg-plus"></span></a></li>
                        </ul>                         
                    </div>                
                        <div class="block-fluid">
                            <table  id="stages_table" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="checkall"/></th>
                                        <th width="40%">@lang('messages.tr_name')</th>
                                        <th width="50%">@lang('messages.tr_description')</th>
                                        <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stages as $stage)
                                        <tr>
                                        <td><input type="checkbox" name="order[]" /></td>
                                        <td><a href="#">{{ $stage->name }}</a></td>
                                        <td>{{ $stage->description }}</td>
                                        <td class="TAC">
                                            {!! Form::open(['route' => ['stage.destroy',$stage],'method' => 'DELETE']) !!}
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