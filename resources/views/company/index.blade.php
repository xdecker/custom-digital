@extends('layouts.app', ['activePage' => 'compañía', 'titlePage' => __('Perfil de Compañía')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            @csrf
            @foreach($companies as $companies)
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Compañía') }}</h4>
                <p class="card-category">{{ __('Información del Negocio') }}</p>
              </div>

                <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$companies->nombreEmpresa}}" readOnly="true"/>
                        <!--<h3>{{$companies->nombreEmpresa}}</h3> -->
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" value="{{$companies->tipoEmpresa}}" readOnly="true"/>
                        <!--<h3>{{$companies->tipoEmpresa}}</h3>-->
                    </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="{{$companies->telefono}}" readOnly="true"/>
                            <!--<h3>{{$companies->telefono}}</h3> -->
                        </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Usuarios Administrador') }}</label>
                        <div class="col-sm-7">
                            @foreach($companies->users as $user)
                                @if($user->type == 'Adm')
                                    <input type="text" class="form-control" value="{{$user->name}}" readOnly="true"/>
                                @endif



                            @endforeach

                        </div>
              </div>


              <div class="row">
                  <br>
                  <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                  <div class="col-sm-7">
                      <img src="{{ asset('/img/logos/'.$companies->logo) }}" alt="logo" width="150px">
                  </div>
              </div>
                    <a href="{{route('company.update',$companies->id)}}" class="btn btn-primary"> Editar </a>
              </div>

            </div>
                <br>
            @endforeach
          </div>

        </div>

      </div>

    </div>

@endsection
