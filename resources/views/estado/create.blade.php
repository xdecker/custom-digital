



@extends('layouts.app', ['activePage' => 'estado', 'titlePage' => __('Listado de estados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/in/estado')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Crear Estado') }}</h4>
                
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
                  <label class="col-sm-2 col-form-label">{{ __('Nombre del Estado') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="nombreEstado" type="text" placeholder="{{ __('Nombre del Estado') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                
              

              

              



              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>

          </form>
        </div>
        </div>
      </div>
    </div>
@endsection
