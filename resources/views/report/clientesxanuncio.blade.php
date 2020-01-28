<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Clientes por anuncios</title>
    <link rel="cd-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/cd-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

    <script type="text/javascript">
        var json = <?php echo $anuncio; ?>

        //console.log( JSON.stringify(json) );
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        google.charts.load('current', {packages: ['table']});
        google.charts.setOnLoadCallback(drawTable);


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

        function drawTable()
        {
            var data = new google.visualization.arrayToDataTable(json);

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '70%', height: '100%'});
        }


    </script>

    <style>
        td{
            text-align:center !important;
        }
    </style>
</head>
<body>
<div class="">

    <br />
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte de Clientes por cada Anuncio   <?php setlocale(LC_TIME,"es_EC"); $date = getDate();
                echo " $date[weekday] $date[mday], $date[month], $date[year]"?></h3>
            </div>
            <div class="panel-body" align="center">
                <div id="pie_chart" style="width:750px; height:350px;">

                </div>

                <div id="table_div" class="table" style="text-align:center">

                </div>

            </div>
        </div>

    </div>


</div>

<script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
</body>
</html>
