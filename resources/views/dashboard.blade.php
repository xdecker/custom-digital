@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people</i>
              </div>
              <p class="card-category">Gestores</p>
              <h3 class="card-title">{{$total_sellers}}

              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">lens</i><a>Check their tasks</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">bar_chart</i>
              </div>
              <p class="card-category">Anuncios</p>
              <h3 class="card-title">{{$total_ads}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> {{date('F')}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">mail_outline</i>
              </div>
              <p class="card-category">Mails Enviados</p>
              <h3 class="card-title">{{$total_mails}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">date_range</i> {{date('F')}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">person</i>
              </div>
              <p class="card-category">Clientes</p>
              <h3 class="card-title">{{$total_clients}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title" align="center"><b>Clientes Potenciales</b></h4>



                    <canvas id="speedChart" width="600" height="400"></canvas>




            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> just updated
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-primary">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title" align="center"><b>Clientes por Estado de {{date('M')}}</b></h4>

                    <canvas id="estadoChart" width="600" height="400"></canvas>

            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> just updated
              </div>
            </div>
          </div>
        </div>

      </div>

  </div>
@endsection

@push('js')
  <script type="text/javascript">

    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
        graficar1();
        graficar2();

      function graficar1(){
          var jclients_month = <?php echo $jclients_month; ?>;
          //console.log(jclients_month);
          var speedCanvas = document.getElementById("speedChart");

          Chart.defaults.global.defaultFontFamily = "Roboto";
          Chart.defaults.global.defaultFontSize = 14;

          //Arreglos del json
          var etiquetas = [];
          var valores = [];


          for(var count=0; count< jclients_month.length; count++)
          {
              etiquetas.push(jclients_month[count].months);
              valores.push(jclients_month[count].clients);
          }


          var speedData = {
              labels: etiquetas,
              datasets: [{
                  label: "Posibles Clientes",
                  data: valores,
                  borderColor: '#2257ba'
              }]
          };

          var chartOptions = {
              legend: {
                  display: true,
                  position: 'bottom',
                  labels: {
                      boxWidth: 80,
                      fontColor: '#2257ba'
                  }
              }
          };

          var lineChart = new Chart(speedCanvas, {
              type: 'line',
              data: speedData,
              options: chartOptions
          });


      }

      function graficar2(){
          var jclients_state = <?php echo $jclients_state; ?>;
          //console.log(jclients_state);
          var estadoCanvas = document.getElementById("estadoChart");

          Chart.defaults.global.defaultFontFamily = "Roboto";
          Chart.defaults.global.defaultFontSize = 14;

          //Arreglos del json
          var etiquetas = [];
          var valores = [];


          for(var count=0; count< jclients_state.length; count++)
          {
              etiquetas.push(jclients_state[count].estado);
              valores.push(jclients_state[count].cantidad);
          }

          //console.log(etiquetas);
          //console.log(valores);

          var estadoData =  {
              labels:etiquetas,
              datasets: [{
                  label:"Clientes por Estado",
                  data: valores,
                  borderColor: '#2257ba',
                  borderWidth: 2,
                  hoverBorderWidth: 1,
                  backgroundColor: 'rgba(34, 87, 186, 0.3)'
              }]
          };

          var chartOptions = {
              legend: {
                  display: true,
                  position: 'bottom',
                  labels: {
                      boxWidth: 80,
                      fontColor: 'rgb(34,87,186)'
                  }
              }
          };

          var barChart = new Chart(estadoCanvas, {
              type: 'bar',
              data: estadoData,
              options: chartOptions
          });
      }


    });
  </script>
@endpush
