@extends('layouts.app', ['activePage' => 'Anuncios', 'titlePage' => __('Listado de Anuncios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @csrf


            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Anuncio') }}</h4>
                <p class="card-category">{{ __('Información del Anuncio') }}</p>
              </div>

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
                          <div class="col-12 text-right">
                              <a href="{{ url('anuncio/create') }}" class="btn btn-sm btn-primary">{{ __('Crear anuncio') }}</a>
                          </div>
                      </div>

                      <div class="table-responsive">
                          <table class="table table-hover">
                              <thead class="text-primary">
                              <th>{{ __('Nombre') }}</th>

                              <th class="text-right">{{ __('Acciones') }}</th>

                              </thead>
                              <tbody>
                              @if($anuncios->count())
                                  @foreach($anuncios as $anuncios)
                                      <tr>
                                          <td style="font-weight:500">{{$anuncios->nombre}}</td>

                                          <td class ="td-actions text-right">



                                              <form action="{{route('estado.destroy', $anuncios->id)}}" method="post">
                                                  @csrf
                                                  @method('delete')

                                                  <a rel="tooltip" class="btn btn-primary btn-link" title="" data-original-title="Editar estado" href="{{action('EstadoController@edit', $anuncios->id)}}">
                                                      <i class="material-icons">edit</i>
                                                      <div class="ripple-container"></div>
                                                  </a>
                                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" title="" data-original-title="Eliminar" onclick="confirm('{{ __("Estas seguro que deseas eliminar este anuncio?") }}') ? this.parentElement.submit() : ''">
                                                      <i class="material-icons">close</i>
                                                      <div class="ripple-container"></div>
                                                  </button>


                                              </form>
                                          </td>
                                          <td>

                                          </td>
                                      </tr>
                                  @endforeach
                              @else
                                  <tr>
                                      <td colspan="8">No hay registro !!</td>
                                  </tr>
                              @endif




                              </tbody>
                          </table>
                      </div>

                @foreach($anuncios as $anuncios)


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
                            <textarea name="" class="form-control"  rows="2" value="{{$anuncios->ubicacion}}" readonly="true">{{$anuncios->ubicacion}}</textarea>

                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Palabras Claves') }}</label>
                        <div class="col-sm-7">
                            <textarea name="" class="form-control"  rows="2" value="{{$anuncios->palabrasClaves}}" readonly="true">{{$anuncios->palabrasClaves}}</textarea>

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

                    <a href="{{route('anuncio.update', $anuncios->id)}}" class="btn btn-primary"> Editar </a>
              </div>

            </div>
                <br>
            @endforeach
          </div>

        </div>

      </div>

    </div>

@endsection
