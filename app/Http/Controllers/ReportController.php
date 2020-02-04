<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Anuncio;


class ReportController extends Controller
{
    //
    public function index()
    {

        $data = DB::table('clients')->join('anuncios', 'clients.anuncio_id','=','anuncios.id')
            ->select(
                DB::raw('anuncios.nombre as anuncio'),
                DB::raw('count(*) as number'))
            ->groupBy('anuncio')
            ->get();


        $array[] = ['Anuncio', 'Cantidad'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->anuncio, $value->number];
        }
        return view('report.clientesxanuncio')->with('anuncio', json_encode($array));
    }

    function fetch_data(Request $request)
    {

            $data = DB::table('clients')->join('anuncios', 'clients.anuncio_id', '=', 'anuncios.id')
                ->select('anuncios.*', 'clients.name as nombre_cliente')
                ->orderBy('anuncios.created_at', 'asc')
                ->get();

            echo json_encode($data);

    }



    function fetch_data2(Request $request)
    {

        $data = Anuncio::With('clients')
            ->get();
        echo json_encode($data);

    }


    public function rclient_seller()
    {
        $data = DB::table('clients')->join('sellers', 'clients.seller_id','=','sellers.id')
            ->join('users', 'sellers.user_id','=','users.id')
            ->select(
                DB::raw('users.name as vendedor'),
                DB::raw('count(*) as number'))
            ->groupBy('vendedor')
            ->get();



        $array[] = ['Vendedor', 'Clientes Asignados'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->vendedor, $value->number];
        }
        return view('report.clientesxgestor')->with('sellers', json_encode($array));
    }
}
