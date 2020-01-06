@extends('layouts.app', ['activePage' => 'Estados', 'titlePage' => __('Listado de Estados')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title"> {{ __('Estados') }} </h4>
              <p class="card-category"> {{ __('Hecha un vistazo a los estados registrados') }}</p>

          </div>
          <div class="card-body">
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
                          <a href="{{ route('estado.create') }}" class="btn btn-sm btn-primary">{{ __('Crear estado') }}</a>
                      </div>
                  </div>

            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="text-primary">
                  <th>{{ __('Nombre') }}</th>
               <th class="text-right">{{ __('Acciones') }}</th>

                </thead>
                <tbody>
               @if($estados->count())
                            @foreach($estados as $estado)
                            <tr>
                              <td style="font-weight:500">{{$estado->nombreEstado}}</td>

                              <td class ="td-actions text-right">
<!--                                  <a class="btn btn-primary btn-xs" href="{{action('EstadoController@edit', $estado->id)}}" >
                                      <span class="material-icons">edit</span></a>
-->


                              <form action="{{route('estado.destroy', $estado->id)}}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-primary btn-link" title="" data-original-title="Editar estado" href="{{action('EstadoController@edit', $estado->id)}}">
                                      <i class="material-icons">edit</i>
                                      <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" title="" data-original-title="Eliminar" onclick="confirm('{{ __("Estas seguro que deseas eliminar este estado?") }}') ? this.parentElement.submit() : ''">
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
  </div>
</div>
@endsection
