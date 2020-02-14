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
                              <a href="{{ url('in/anuncio/create') }}" class="btn btn-sm btn-primary">{{ __('Crear anuncio') }}</a>
                          </div>
                      </div>

                      <div class="table-responsive">
                          <table class="table table-hover">
                              <thead class="text-primary">
                              <th>{{ __('Nombre') }}</th>
                              <th>{{ __('Palabras Claves') }}</th>
                              <th>{{ __('Fecha de Inicio') }}</th>
                              <th>{{ __('Fecha de Fin') }}</th>
                              <th>{{ __('Presupuesto') }}</th>

                              <th class="text-right">{{ __('Acciones') }}</th>

                              </thead>
                              <tbody>
                              @if($anuncios->count())
                                  @foreach($anuncios as $anuncios)
                                      <tr>
                                          <td style="font-weight:500">{{$anuncios->nombre}}</td>
                                          <td>{{$anuncios->palabrasClaves}}</td>
                                          <td>{{$anuncios->fechaInicio}}</td>
                                          <td>{{$anuncios->fechaFin}}</td>
                                          <td>{{$anuncios->presupuesto}}</td>

                                          <td class ="td-actions text-right">



                                              <form action="{{route('anuncio.destroy', $anuncios->id)}}" method="post">
                                                  @csrf


                                                  <a rel="tooltip" class="btn btn-primary btn-link" title="" data-original-title="Editar estado" href="{{route('anuncio.update',$anuncios->id)}}">
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

          </div>

        </div>

      </div>

    </div>

@endsection
