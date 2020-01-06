@extends('layouts.app', ['activePage' => 'Anuncios', 'titlePage' => __('Listado de Anuncios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @csrf
            @foreach($anuncios as $anuncios)
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Anuncio') }}</h4>
                <p class="card-category">{{ __('Información del Anuncio') }}</p>
              </div>

                <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$anuncios->nombre}}" readOnly="true"/>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Descripción') }}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="{{$anuncios->descripcion}}" readOnly="true"/>
                    </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Ubicación') }}</label>
                        <div class="col-sm-7">
                            <textarea name="" class="form-control"  rows="2" value="{{$anuncios->ubicacion}}" readonly="true"></textarea>
                            <input type="text" class="form-control" value="{{$anuncios->ubicacion}}" readOnly="true"/>
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Palabras Claves') }}</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="{{$anuncios->palabrasClaves}}" readOnly="true"/>
                        </div>
              </div>

              <div class="row">
                  <br>
                  <label class="col-sm-2 col-form-label">{{ __('Fecha Inicio') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$anuncios->fechaInicio}}" readOnly="true"/>
                  </div>
              </div>

              <div class="row">
                  <br>
                  <label class="col-sm-2 col-form-label">{{ __('Fecha Fin') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$anuncios->fechaFin}}" readOnly="true"/>
                  </div>
              </div>

              <div class="row">
                  <br>
                  <label class="col-sm-2 col-form-label">{{ __('Presupuesto') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$anuncios->presupuesto}}" readOnly="true"/>
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
