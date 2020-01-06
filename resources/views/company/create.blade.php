@extends('layouts.app', ['activePage' => 'compañía', 'titlePage' => __('Perfil de Compañía')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('/in/company')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
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
                      <input class="form-control" name="nombreEmpresa" type="text" placeholder="{{ __('Name of Company') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Type') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="tipoEmpresa" type="text" placeholder="{{ __('Type of Company') }}" value="" required="true" aria-required="true"/>
                        </div>
                    </div>
              </div>

              <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="telefono" type="text" placeholder="{{ __('Phone') }}" value="" required="true" aria-required="true"/>
                            </div>
                        </div>
              </div>

               <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Usuario Administrador') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="form-control" name="name_users" id="">
                                    @foreach ($users as $users)
                                        <option value="{{$users->id}}"> {{$users->name}}</option>
                                    @endforeach
                                </select>
                                <!--<input class="form-control" name="telefono" type="text" placeholder="{{ __('Phone') }}" value="" required="true" aria-required="true"/> -->
                            </div>
                        </div>
               </div>

              <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                  <div class="col-sm-7">
                          <input type="file" name="logo">
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
