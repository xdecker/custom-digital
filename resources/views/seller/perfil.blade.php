@extends('layouts.app', ['activePage' => 'Gestores de Ventas', 'titlePage' => __('Perfil de '.auth()->user()->name)])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @csrf
            @foreach($seller as $seller)
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Perfil')}}</h4>
                <p class="card-category">{{ __('Información del Usuario') }}</p>
              </div>

                <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$seller->user->name}}" readOnly="true"/>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Correo electrónico') }}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="{{$seller->user->email}}" readOnly="true"/>
                    </div>
              </div>

              <div class="row">
                  <br>
                  <label class="col-sm-2 col-form-label">{{ __('Ventas Estimadas') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$seller->ventasEstimadas}}" readOnly="true"/>
                  </div>
              </div>

              <div class="row">
                  <br>
                  <label class="col-sm-2 col-form-label">{{ __('Ventas Realizadas') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$seller->ventasReales}}" readOnly="true"/>
                  </div>
              </div>

              <div class="row">

                  <div class="container">
                      <br>
                      <h4> <b>Progreso de Ventas Mensuales</b></h4>


                      <div class="progress">

                          <div aria-valuemax="100"
                               aria-valuemin="0" aria-valuenow="75" class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                               style="width: {{($seller->progreso)*100}}%">{{($seller->progreso)*100}}%</div>
                      </div>


                      <br>
                  </div>

              </div>

                    <a href="#" class="btn btn-primary"> Editar </a>
              </div>

            </div>
                <br>
            @endforeach
          </div>

        </div>

      </div>

    </div>

@endsection
