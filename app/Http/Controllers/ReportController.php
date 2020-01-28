<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    //
    public function rclient_ad()
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
