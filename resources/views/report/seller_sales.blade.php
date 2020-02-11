@extends('layouts.app', ['activePage' => 'Reportes', 'titlePage' => __('Reportes')])


@section('content')



<div class="content">

    <div class="container-fluid">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Reporte de Clientes por cada Anuncio   <?php setlocale(LC_TIME,"es_EC"); $date = getDate();
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

        $(document).ready(function(){

            //fetch_data();
            fetch_data2();
            /*function fetch_data()
            {
                $.ajax({
                    url:"/in/table/fetch_data",
                    dataType:"json",
                    success:function(data)
                    {
                        var html = '';


                        for(var count=0; count < data.length; count++)
                        {
                            html +='<tr>';
                            html +='<td contenteditable class="column_name" data-column_name="nombre" data-id="'+data[count].id+'">'+data[count].nombre+'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="descripcion" data-id="'+data[count].id+'">'+data[count].descripcion+'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="ubicacion" data-id="'+data[count].id+'">'+data[count].ubicacion+'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="palabrasClaves" data-id="'+data[count].id+'">'+data[count].palabrasClaves+'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="fechaInicio" data-id="'+data[count].id+'">'+data[count].fechaInicio+'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="fechaFin" data-id="'+data[count].id+'">'+data[count].fechaFin+'</td>';
                            html += '<td contenteditable class="column_name" data-column_name="nombre_cliente" data-id="'+data[count].id+'">'+data[count].nombre_cliente+'</td>';
                            html += '</tr>';

                        }
                        $('tbody').html(html);
                    }
                });
            }

             */
        function fetch_data2()
        {
            $.ajax({
                url:"/in/table/fetch_data2",
                dataType:"json",
                success:function(data)
                {
                    var html = '';


                    for(var count=0; count < data.length; count++)
                    {
                        html += '<tr >';
                        html += '<td class="table-dark"><b>Nombre de Anuncio</b></td>';
                        html += '<td class="table-dark"><b>Descripcion de anuncio</b></td>';
                        html += '<td class="table-dark"><b>Ubicaciones</b></td>';
                        html += '<td class="table-dark"><b>Intereses</b></td>';
                        html += '<td class="table-dark"><b>Fecha de Inicio</b></td>';
                        html += '<td class="table-dark"><b>Fecha de Fin</b></td>';
                        html += '</tr>';
                        html +='<tr class="table-success">';
                        html +='<td contenteditable class="column_name" data-column_name="nombre" data-id="'+data[count].id+'"><b>'+data[count].nombre+'</b></td>';
                        html +='<td contenteditable class="column_name" data-column_name="descripcion" data-id="'+data[count].id+'"><b>'+data[count].descripcion+'</b></td>';
                        html +='<td contenteditable class="column_name" data-column_name="ubicacion" data-id="'+data[count].id+'"><b>'+data[count].ubicacion+'</b></td>';
                        html +='<td contenteditable class="column_name" data-column_name="palabrasClaves" data-id="'+data[count].id+'"><b>'+data[count].palabrasClaves+'</b></td>';
                        html +='<td contenteditable class="column_name" data-column_name="fechaInicio" data-id="'+data[count].id+'"><b>'+data[count].fechaInicio+'</b></td>';
                        html +='<td contenteditable class="column_name" data-column_name="fechaFin" data-id="'+data[count].id+'"><b>'+data[count].fechaFin+'</b></td>';
                        html += '</tr>';
                        //console.log(data[count]['clients']);
                        html+='<tr> <td colspan="6" class="table-dark" style="vertical-align:middle"> <h4><b>Información de los Clientes</b></h4> </td> </tr>';
                        html+='<tr class="table-secondary">';
                        html+=' <td> <b> # </b>  </td>';
                        html+=' <td> <b> Nombre del Cliente </b>  </td>';
                        html+=' <td> <b> Email del Cliente </b>  </td>';
                        html+=' <td> <b> Telefono </b>  </td>';
                        html+=' <td> <b> Observación </b>  </td>';
                        html+=' <td> <b> Fecha de Registro </b>  </td>';
                        html+='</tr>';
                        for(var contador=0; contador< data[count]['clients'].length; contador++){
                            html += '<tr>';
                            html += '<td>';
                            html += contador+1;
                            html += '</td>';
                            html += '<td >'+data[count]['clients'][contador].name+'</td>';
                            html += '<td >'+data[count]['clients'][contador].email+'</td>';
                            html += '<td >'+data[count]['clients'][contador].phone+'</td>';
                            html += '<td >'+data[count]['clients'][contador].observations+'</td>';
                            html += '<td >'+data[count]['clients'][contador].registrationDate+'</td>';
                            html+= '</tr>';

                        }


                    }
                    $('tbody').html(html);
                }
            });
        }


    });





    var json = <?php echo $anuncio; ?>

            //console.log( JSON.stringify(json) );
            google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);



        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(json);
            var options = {
                title : 'Porcentaje de Clientes por Anuncio',
                pieHole: 0.4,
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }



    </script>
@endpush
