@extends('layouts.app', ['activePage' => 'Anuncios', 'titlePage' => __('Perfil de Anuncio')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route("anuncio.update",$anuncio->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Anuncio') }}</h4>
                <p class="card-category">{{ __('Información del Anuncio') }}</p>
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
                      <input class="form-control" name="nombre" type="text"  value="{{ old('nombre', $anuncio->nombre)}}" required="true" aria-required="true"/>
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
                                <textarea name="descripcion" class="form-control" style="border: 1px solid #eee;" id="" rows="2" value=""  aria-required="true">{{ old('descripcion', $anuncio->descripcion)}}</textarea>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label" >{{ __('Ubicación') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea name="ubicacion" class="form-control" style="border: 1px solid #eee;" id="" rows="2" value=""  aria-required="true">{{ old('ubicacion', $anuncio->ubicacion)}}</textarea>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label" >{{ __('Palabras Claves') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea name="palabrasClaves" class="form-control" style="border: 1px solid #eee;" id="" rows="2" value=""  aria-required="true">{{ old('palabrasCLaves', $anuncio->palabrasClaves)}}</textarea>
                            </div>
                        </div>
                </div>


                <div class="row">
                    <label class="col-sm-2 col-form-label" >{{ __('Fecha Inicio') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="fechaInicio" type="date"  value="{{ old('fechaInicio', $anuncio->fechaInicio)}}" required="true" aria-required="true"/>
                            </div>
                        </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label" >{{ __('Fecha Fin') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="fechaFin" type="date"  value="{{ old('fechaFin', $anuncio->fechaFin)}}" required="true" aria-required="true"/>
                            </div>
                        </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Presupuesto') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="presupuesto" type="text" value="{{ old('presupuesto', $anuncio->presupuesto)}}" required="true" aria-required="true"/>
                        </div>
                    </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
              </div>
            </div>

          </form>
        </div>
        </div>
      </div>
    </div>
@endsection
