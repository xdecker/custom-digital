



@extends('layouts.app', ['activePage' => 'mail', 'titlePage' => __('Enviar Correo')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/in/sendmail')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Crear Email') }}</h4>

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
                      <input class="form-control" name="nombre" type="text" placeholder="{{ __('Nombre') }}" value="{{old('nombre') }}"  aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Correo') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="correo" type="text" placeholder="{{ __('Ingresa el correo a enviar') }}" value="{{old('correo') }} required="true" aria-required="true"/>
                            </div>
                        </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Asunto') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="asunto" type="text" placeholder="{{ __('Asunto del mensaje') }}" value="{{old('asunto') }} required="true" aria-required="true"/>
                            </div>
                        </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Contenido') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea name="contenido"  class="form-control" style="border: 1px solid #eee;" id="" rows="2" value=""  aria-required="true"></textarea>
                            </div>
                        </div>
                </div>





              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
              </div>
            </div>
          </div>
          </form>

        </div>
        </div>
      </div>
    </div>
@endsection
