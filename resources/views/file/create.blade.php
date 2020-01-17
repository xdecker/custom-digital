



@extends('layouts.app', ['activePage' => 'Importar-BaseDatos', 'titlePage' => __('Importar Bases')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('upload')}}"  class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Importar Archivo') }}</h4>

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
                    <label class="col-sm-2 col-from-label"></label>
                    <div class="col-md-6">
                        <p> <a class="btn btn-info btn-sm"  href="{{ asset('material') }}/formato.xls">Descargar formato aquí</a></p>
                    </div>
                </div>

                    <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Subir archivo') }}</label>

                      <div class="col-sm-6 ">

                          <div class="form-group">
                              <label for="file" class="sr-only">File</label>
                              <div class="input-group">
                                  <input type="text" name="filename" class="form-control" placeholder="Ningun archivo subido" readonly>
                                  <span class="">
                                         <div class="btn btn-info  custom-file-uploader" style="margin-top: 0;">
                                            <input type="file" name="archivo" onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                                <i class="material-icons">attach_file</i>
                                        </div>
                                    </span>
                              </div>
                          </div>

                      </div>

                  </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Anuncio') }}</label>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="name_anuncios" id="" >
                                    <option value="" selected disabled>Seleccionar anuncio</option>
                                    @foreach ($anuncios as $anuncios)
                                        <option value="{{$anuncios->id}}"> {{$anuncios->nombre}}</option>
                                    @endforeach
                                </select>
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
