@extends('layouts.app', ['activePage' => 'company', 'titlePage' => __('Company Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route("company.update",$companies->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Company') }}</h4>
                <p class="card-category">{{ __('Business information') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="nombreEmpresa" type="text"  value="{{ old('nombreEmpresa', $companies->nombreEmpresa)}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="tipoEmpresa" type="text" value="{{ old('tipoEmpresa', $companies->tipoEmpresa)}}" required="true" aria-required="true"/>
                        </div>
                    </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="telefono" type="text" value="{{ old('telefono', $companies->telefono)}}" required="true" aria-required="true"/>
                            </div>
                        </div>
              </div>

               <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Usuario Administrador') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                @foreach($companies->users as $user)
                                    @if($user->type == 'Adm')
                                        <input type="text" class="form-control" value="{{$user->name}}" readOnly="true"/>
                                @endif

                                @endforeach
                                <!--<input class="form-control" name="telefono" type="text" placeholder="{{ __('Phone') }}" value="" required="true" aria-required="true"/> -->
                            </div>
                        </div>
               </div>

              <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                  <div class="col-sm-7">
                          <input type="file">
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
