@extends('layouts.admin')
@section('content')
<script></script>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-3">
                                    <div class="text-value">{{ number_format($totalTickets) }}</div>
                                    
                                    <div>Total tickets</div>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-3">
                                    <div class="text-value">{{ number_format($openTickets) }}</div>
                                    <div>Tickets Nuevos</div>
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-3">
                                    <div class="text-value">{{ number_format($closedTickets) }}</div>
                                    <div>Tickets Resueltos</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6 col-sm-12">
        <div class="card">
            
                <div class="card-header">
                    Ticket en la semana
                </div>
                
            
            <div class="card-body">
                <canvas id="myChart"></canvas>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Ticket por categorías</h3>
            </div>
            <div class="card-body">
                <canvas id="category" width="500" height="500"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>  
         
        var ctx = document.getElementById('myChart').getContext('2d');     
        var weekTicket = (<?php echo json_encode($weekTicket); ?>);
        var myChart = new Chart(ctx, {
            type: 'line', //line = pone la barra de diagrama como una montaña rusa; bar es como barras 
            data: {
                labels: ['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
                datasets: [{
                    label: 'Ticket en la semana',
                    data: weekTicket,
                    // pointStyle: 'circle',
                    spanGaps: true,
                    fill: false,  // no se visualiza el relleno debajo de la linea
                    // showLine: false, //no se visualiza la linea
                    // lineTension: 0, //esto pone la linea recta
                    
                    backgroundColor: [
                        'rgb(33, 90, 206)','rgb(230, 46, 8)','rgb(0, 143, 0)',
                        'rgb(240, 9, 9)','rgb(221, 41, 97)','rgb(24, 165, 141)'
                    ],
                    borderWidth: 1,
                    borderColor: 'black'
                }]
            },
        });
        var ctx = document.getElementById('category').getContext('2d');
        var apoteosys = <?php echo $categoryApoteosys[1][0]; ?>;
        var aurora = <?php echo $categoryAurora[1][0]; ?>;        
        var canalDigital = <?php echo $categoryCanalDigital[1][0]; ?>;
        var cartera = <?php echo $categoryCartera[1][0]; ?>;
        var cobranza = <?php echo $categoryCobranza[1][0]; ?>;
        var cyl = <?php echo $categoryOportudata[1][0]; ?> ;
        var oportudata = <?php echo $categoryOportudata[1][0]; ?>;
        var otros = <?php echo $categoryOtros[1][0]; ?>;
        var redes = <?php echo $categoryRedes[1][0]; ?>;
        var servFina = <?php echo $categorySeF[1][0]; ?>;
        var sopHard = <?php echo $categorySoH[1][0]; ?>;
        var tecnoBog = <?php echo $categoryTB[1][0]; ?>;
        var tecnoPer = <?php echo $categoryTP[1][0]; ?>;
        var category = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Apoteosys', 'Aurora', 'Canal digital', 'Cartera', 'Cobranza', 'Crédito y Libranza', 'Oportudata', 'Otros', 'Redes', 'Servicios Financieros', 'Soluciones Hardware', 'Tecnología Bogóta', 'Tecnología Pereira'],
                datasets: [{
                    label: 'Categoria',
                    data: [apoteosys,aurora,canalDigital,cartera,cobranza,cyl,oportudata,otros,redes,servFina,sopHard,tecnoBog,tecnoPer],
                    backgroundColor: [
                        'rgb(33, 90, 206)','rgb(230, 46, 8)','rgb(0, 143, 0)','rgb(240, 9, 9)','rgb(221, 41, 97)',
                        'rgb(24, 165, 141)','rgb(237, 173, 19)','rgb(0, 123, 255)','rgb(158, 0, 151)', 'rgb(221, 68, 119)',
                        'rgb(230, 25, 75)','rgb(60, 180, 75)', 'rgb(8, 222, 212)'
                    ],
                    
                    borderWidth: 1
                }]
            },
        });
       
</script>
@parent

@endsection