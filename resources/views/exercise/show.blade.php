@extends('layouts.app')


@section('title', 'Detalle del Ejercicio')

@section('js')
    <script>
        $(document).ready(function(){
            
            var table = $('#practices_table').dataTable({
                "bPaginate": true,
                "bSort": false,
                "sSearch" : true,
                "oLanguage": {
                    "sUrl": "{{ asset('js/plugins/datatables/Spanish.js') }}"
                }
            });

            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);

            $("#date_time").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(date){
                    notify('Selección','Fecha : '+date);
                }
            });

        });
    </script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li><a href="{{ url('exercise') }}">@lang('messages.title_exercise')</a></li>
    <li>@lang('messages.title_detail_exercise')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="middle">                                     
                    <div class="button tip" title="" data-original-title="@lang('messages.print_exercise')">
                        <a href="#">
                            <span class="icomg-printer"></span>
                            <span class="text">@lang('messages.print_exercise')</span>
                        </a>                    
                    </div>                                          
            </div>
                
            <div class="widget">
                {{ $exercise }}
                    <div class="block invoice">    
                        <h1>{{ $exercise->name }} #{{ $exercise->id }}</h1>
                        <span class="date">@lang('messages.date_time'): {{ $exercise->created_at }}</span>
                        <div class="row">
                            <div class="col-md-3">
                                <h4>@lang('messages.description')</h4>
                                <address>
                                    {{ $exercise->description }}
                                </address>
                            </div>
                            <div class="col-md-3">
                                <h4>To Enterprise</h4>
                                <address>
                                    <strong>Enterprise, Inc.</strong><br>
                                    321 Streeet, Suite 300<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> +38 (123) 456-7890
                                </address>                                
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <h4>Invoice</h4>
                                <p><strong>Date invoice:</strong> Dec 20, 2012</p>
                                <p><strong>Payment due:</strong> Dec 29, 2012</p>
                                <div class="highlight">
                                    <strong>Amount Due:</strong> $2,351.50 <em>USD</em>
                                </div>
                            </div>
                        </div>
                        
                        <h3>@lang('messages.stages')</h3>                        
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="20%">@lang('messages.description')</th>
                                    <th width="20%">@lang('messages.created_at')</th>
                                    <th width="20%">@lang('messages.practices')</th>
                                    <th width="20%">@lang('messages.students')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exercise->stages as $stage)
                                    <tr>
                                        <td>{{ $stage->name }} </td>
                                        <td>{{ $stage->description }}</td>
                                        <td>{{ $stage->created_at }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($stage->practices as $practice)
                                                    <li>{{ $practice->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $stage->user->degree->abbreviation }} <strong>{{ $stage->user->names }} {{ $stage->user->lastnames }}</strong> ({{ $stage->user->enrollment }})
                                        </td>
                                    </tr>
                                @endforeach                                     
                            </tbody>
                        </table>
                        
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="total">
                                    <p><strong><span>Subtotal:</span> $2,351.50 <em>USD</em></strong></p>
                                    <div class="highlight">
                                        <strong><span>Total:</span> $2,351.50 <em>USD</em></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
            </div>
                
        </div>        
    </div> 
@endsection

@section('modal')
     @include('layouts.modal')
@endsection
