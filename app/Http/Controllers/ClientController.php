<?php

namespace App\Http\Controllers;
use App\Imports\ClientsImport;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\File;
use App\Anuncio;


class ClientController extends Controller
{
    //
    //
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function create()
    {
        $anuncios = Anuncio::Paginate(10);

        return view('file.create')->with(compact('anuncios'));
    }


    public function import(Request $request)
    {
        //validar datos
        $message = [
            'archivo.required' => 'Es necesario cargar un archivo',
            'archivo.mimes' => 'Error, solo se admiten archivos de formato xls'

        ];
        $rules = [
            'archivo'=> 'required|mimes:xls',
            'name_anuncios'=> 'required'


        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior


        //$this->validate($request, [
          // 'archivo' => 'required|mimes:xls, xlsx'
        //]);

            $file = $request->file('archivo');

            $nombreArchivo = $file->getClientOriginalName() . time();

            //$sesion_anuncio = $request->input('name_anuncios')->session()->get('anuncio');
        session(['anuncio' => $request->input('name_anuncios')]);

        $valor_anuncio = session('anuncio');

            (new ClientsImport)->import($file);

            $file->move(public_path() . '/files_import/', $nombreArchivo);
        $seller_id = auth()->user()->id;
            $upload = new File();
            $upload->nameFile = $nombreArchivo;
            $upload->anuncio_id = $request->input('name_anuncios');
            $upload->seller_id = $seller_id;
            $upload->save();

            return redirect('/in/import')->with('status', 'Archivo cargado correctamente');

    }



}
