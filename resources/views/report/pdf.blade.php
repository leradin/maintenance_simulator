<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte</title>
    <style>
        header,
        footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        main {
            padding-bottom: 100px;
        }
        header {
            top: 0px;
            margin-top: 100px;
        }
        footer {
            bottom: 0px;
        }
        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <header class="toolbar">
        <?php
            $pathSemar = public_path('img/custom/semar.jpg');
            $pathCesisccam = public_path('img/backgrounds/background.png');

            $typeSemar = pathinfo($pathSemar, PATHINFO_EXTENSION);
            $typeCesisccam = pathinfo($pathCesisccam, PATHINFO_EXTENSION);

            $dataSemar = file_get_contents($pathSemar);
            $dataCesisccam = file_get_contents($pathCesisccam);

            $base64Semar = 'data:image/' . $typeSemar . ';base64,' . base64_encode($dataSemar);
            $base64Cesisccam = 'data:image/' . $typeCesisccam . ';base64,' . base64_encode($dataCesisccam);
        ?>
        Página <span class="pagenum"></span>
            <div class="left TAL" style="float:left">
                <img src="{{ $base64Semar }}" alt=" " class="img-responsive">
            </div>
            <div class="right TAR" style="float:right"> 
                <img src="{{ $base64Cesisccam }}" alt=" " class="img-responsive"> 
            </div>
    </header>
    
    <main>
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="block invoice">
                        <h1>{{ $report['exercise']['name'] }} #{{ $report['exercise']['id'] }}</h1>
                        <h3> {{ $score['approved'] }} Aprobadas</h3>
                        <h3> {{ $score['approved_not'] }} No Aprobadas</h3>
                        <span class="date">Realizo el  {{ $dateTime }}</span>
                        
                        @foreach($report['exercise']['stages']  as $stage)
                            <hr />
                            <div class="row">
                                <div class="col-md-12"> 
                                <h3>{{ $stage['student']['full_name'] }}</h3>

                                     <h4>{{ $stage['name'] }} # {{ $stage['id'] }}</h4>{{ $stage['description'] }}
                                    <table cellpadding="0" cellspacing="0" width="100%" border="1">
                                        <thead>
                                            <tr>
                                                <th width="5%">Id</th>
                                                <th width="40%">Nombre</th>
                                                <th width="10%">Duración</th>
                                                <th width="20%">Tipo de Error</th>
                                                <th width="20%">Respuesta</th>
                                                <th width="20%">Calificación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($report['exercise']['stages'][$stage['id']]['practices'] as $practice)
                                                <tr>
                                                    <td>{{ $practice['id'] }}</td>
                                                    <td>{{ $practice['name'] }}</td>
                                                    <td>{{ $practice['duration'] }}</td>
                                                    <td>{{ $practice['error_type'] }}</td>
                                                    <td>{{ $practice['answer'] }}</td>
                                                    <td>{{ ($practice['score']) ? 'Aprobo':'No Aprobo' }}</td>
                                                </tr>
                                            @endforeach  
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <br />
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </main>
    <footer>
        Página <span class="pagenum"></span>
    </footer>                  
</body>
</html>