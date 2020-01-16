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
        $this->validate($request, [
           'archivo' => 'required|mimes:xls, xlsx'
        ]);

            $file = $request->file('archivo');

            $nombreArchivo = $file->getClientOriginalName() . time();

            (new ClientsImport)->import($file);

            $file->move(public_path() . '/files_import/', $nombreArchivo);

            $upload = new File();
            $upload->nameFile = $nombreArchivo;
            $upload->anuncio_id = $request->input('name_anuncios');
            $upload->save();

            return redirect('/in/import')->with('success', 'File imported successfully!');

    }



}
