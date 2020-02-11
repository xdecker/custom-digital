@extends('layouts.app', ['activePage' => 'Reportes', 'titlePage' => __('Crear Reporte')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('in/report')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Reporte') }}</h4>
                <p class="card-category">{{ __('Información del Reporte') }}</p>
              </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Escoger Reporte') }}</label>
                  <div class="col-sm-7">

                      <div class="form-group">
                          <select class="form-control" name="tipo_reporte" id="">
                              <option value="" selected disabled>Seleccionar reporte</option>

                                  <option value="1"> Reporte Clientes por Anuncio</option>
                                  <option value="2"> Reporte Clientes por Gestor</option>
                                  <option value="3"> Reporte de Captaciones por Gestor</option>

                          </select>
                      </div>

                  </div>
                </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label" >{{ __('Fecha Inicio') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="fechaInicio" type="date" placeholder="{{ __('Fecha de inicio') }}" value=""  aria-required="true"/>
                            </div>
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Fecha Fin') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="fechaFin" type="date" placeholder="{{ __('Fecha fin') }}" value=""  aria-required="true"/>
                            </div>
                        </div>
              </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
              </div>
            </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
@endsection
