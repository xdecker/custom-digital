<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Imports\ClientsImport;

class ClientController extends Controller
{
    //
    //
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }


    public function import(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            (new ClientsImport)->import($file);
            $nombreArchivo = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/files_import/', $nombreArchivo);
            return redirect('/')->with('success', 'File imported successfully!');
        } else {
            return redirect('/')->with('success', 'File not imported!');
        }
    }

}
