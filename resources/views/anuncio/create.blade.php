@extends('layouts.app', ['activePage' => 'Anuncios', 'titlePage' => __('Registrar Anuncio')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('anuncio')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Anuncio') }}</h4>
                <p class="card-category">{{ __('Información de Anuncio') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('Nombre') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="nombre" type="text" placeholder="{{ __('Nombre de Anuncio') }}" value="" required="true" aria-required="true"/>
                    </div>

                      <div class="form-group" style="display:none">
                          <input class="form-control" name="company_id" type="text"  value="{{auth()->user()->company_id}}"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" >{{ __('Descripción') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <textarea name="descripcion" class="form-control" style="border: 1px solid #eee;" id="" rows="2" value=""  aria-required="true"></textarea>
                        </div>
                    </div>
              </div>
              <div class="row">
                        <label class="col-sm-2 col-form-label" rel="tooltip" title="" data-original-title ="Separar cada ubicación con punto y coma ; Ejemplo: Guayaquil;Quito">{{ __('Ubicaciones') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group" rel="tooltip" title="" data-original-title ="Separar cada ubicación con punto y coma ; Ejemplo: Guayaquil;Quito">
                                <textarea name="ubicacion" class="form-control" style="border: 1px solid #eee;" id="" rows="2" value="" required="" aria-required="true"></textarea>
                            </div>
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label" rel="tooltip" title="" data-original-title ="Separar cada palabra clave con punto y coma ; Ejemplo: Educación;Colegio">{{ __('Palabras Claves') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group" rel="tooltip" title="" data-original-title ="Separar cada palabra clave con punto y coma ; Ejemplo: Educación;Colegio">
                                <textarea name="palabrasClaves" class="form-control" style="border: 1px solid #eee;" id="" rows="2" value="" required="" aria-required="true"></textarea>
                            </div>
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label" >{{ __('Fecha Inicio') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="fechaInicio" type="date" placeholder="{{ __('Fecha de inicio') }}" value="" required="true" aria-required="true"/>
                            </div>
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Fecha Fin') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="fechaFin" type="date" placeholder="{{ __('Fecha fin') }}" value="" required="true" aria-required="true"/>
                            </div>
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Presupuesto') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="presupuesto" type="text" placeholder="" value="" required="true" aria-required="true"/>
                            </div>
                        </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
            </div>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
@endsection
