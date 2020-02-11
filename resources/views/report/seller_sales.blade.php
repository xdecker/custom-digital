@extends('layouts.app', ['activePage' => 'Reportes', 'titlePage' => __('Reportes')])


@section('content')



<div class="content">

    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Reporte de Captacion por Gestores   <?php setlocale(LC_TIME,"es_EC"); $date = getDate();
                    echo " $date[weekday] $date[mday], $date[month], $date[year]"?></h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body" align="center">
                    <canvas id="captacionChart" width="600" height="300"></canvas>

                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless" style="text-align:center; vertical-align:middle">

                            <tbody>

                            </tbody>
                        </table>
                        {{ csrf_field() }}

                        <br> <br> <br>
                    </div>


                </div>
            </div>

        </div>

    </div>


</div>
@endsection

@push('js')

    <script type="text/javascript">

        var jseller_sales = <?php echo $jseller_sales; ?>;

        $(document).ready(function(){

            fetch_data3();
            grafico2();




                function fetch_data3()
                {
                    var data = jseller_sales;

                            var html = '';
                            console.log(data);

                    html += '<tr>';
                    html += '<td class="table-dark"><b>#</b></td>';
                    html += '<td class="table-dark"><b>Nombre de Vendedor</b></td>';
                    html += '<td class="table-dark"><b>Captaciones Estimadas</b></td>';
                    html += '<td class="table-dark"><b>Captaciones Reales</b></td>';
                    html += '</tr>';

                            for(var count=0; count < data.length; count++)
                            {

                                html +='<tr>';
                                html +='<td><b>';
                                html += count+1;
                                html +='</b></td>';
                                html +='<td><b>'+data[count].nombre+'</b></td>';
                                html +='<td><b>'+data[count].captacionesEstimadas+'</b></td>';
                                html +='<td><b>'+data[count].captacionesReales+'</b></td>';
                                html += '</tr>';

                            }
                            $('tbody').html(html);


                }


            function grafico2(){

                //console.log(jseller_sales);
                var captacionCanvas = document.getElementById("captacionChart");

                Chart.defaults.global.defaultFontFamily = "Roboto";
                Chart.defaults.global.defaultFontSize = 14;

                //Arreglos del json
                var etiquetas = [];
                var valores = [];
                var valores2 = [];


                for(var count=0; count< jseller_sales.length; count++)
                {
                    etiquetas.push(jseller_sales[count].nombre);
                    valores.push(jseller_sales[count].captacionesEstimadas);
                    valores2.push(jseller_sales[count].captacionesReales);
                }


                var estimadaData =  {
                    label:'Captaciones Estimadas',
                    data: valores,
                    borderColor: '#2257ba',
                    borderWidth: 2,
                    hoverBorderWidth: 1,
                    backgroundColor: 'rgba(34, 87, 186, 0.3)'
                };

                var realData =  {
                    label:'Captaciones Reales',
                    data: valores2,
                    borderColor: '#2ff7e4',
                    borderWidth: 2,
                    hoverBorderWidth: 1,
                    backgroundColor: 'rgba(47, 247, 228, 0.3)'
                };

                var captacionData = {
                    labels: etiquetas,
                    datasets: [estimadaData,realData]
                };

                var barChart = new Chart(captacionCanvas, {
                    type: 'bar',
                    data: captacionData,

                });
            }

    });





    </script>
@endpush
