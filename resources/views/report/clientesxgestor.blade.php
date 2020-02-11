@extends('layouts.app', ['activePage' => 'Reportes', 'titlePage' => __('Reportes')])


@section('content')



    <div class="content">

        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Reporte de Clientes Asignados por Gestor   <?php setlocale(LC_TIME,"es_EC"); $date = getDate();
                            echo " $date[weekday] $date[mday], $date[month], $date[year]"?></h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body" align="center">
                        <div id="pie_chart" style="width:750px; height:350px;">

                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped table-borderless" style="text-align:center; vertical-align:middle">

                                <tbody>

                                </tbody>
                            </table>


                            <br> <br>
                        </div>


                    </div>
                </div>

            </div>

        </div>


    </div>
@endsection

@push('js')

    <script type="text/javascript">

        $(document).ready(function(){


            fetch_data3();


            function fetch_data3()
            {
                $.ajax({
                    url:"/in/table/fetch_data3",
                    dataType:"json",
                    success:function(data)
                    {
                        var html = '';
                        console.log(data);

                            for (var count = 0; count < data.length; count++) {
                                html += '<tr>';
                                html += '<td class="table-dark" colspan="2"><h4><b> Nombre del Vendedor</b></h4></td>';
                                html += '<td class="table-dark" colspan="3"><h4><b>'+data[count]['user'].name+'</b></h4></td>';
                                html += '<tr>';

                                html += '<tr class="table-secondary">';
                                html += '<td> <b>#</b> </td>';
                                html += '<td> <b>Nombre</b> </td>';
                                html += '<td> <b>Email</b> </td>';
                                html += '<td> <b>Teléfono</b> </td>';
                                html += '<td> <b> Fecha de Registro </b> </td>';
                                html += '<tr>';

                                for (var contador = 0; contador< data[count]['clients'].length; contador++){
                                    html += '<tr>';
                                    html += '<td class="">';
                                    html += contador + 1;
                                    html += '</td>';

                                    html += '<td>'+data[count]['clients'][contador].name+'</td>';
                                    html += '<td>'+data[count]['clients'][contador].email+'</td>';
                                    html += '<td>'+data[count]['clients'][contador].phone+'</td>';
                                    html += '<td>'+data[count]['clients'][contador].registrationDate+'</td>';

                                    html += '</tr>';

                                }
                            }

                        $('tbody').html(html);
                    }
                });
            }


        });





        var json = <?php echo $sellers; ?>

            //console.log( JSON.stringify(json) );
            google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);



        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(json);
            var options = {
                title : 'Porcentaje de Clientes Asignados por Gestor',
                pieHole: 0.4,
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }



    </script>
@endpush
