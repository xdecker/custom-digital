<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Anuncio;
use App\Seller;
use App\Client;

class ReportController extends Controller
{
    //

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        //validar datos
        $message = [
            'tipo_reporte.required' => 'Es necesario ingresar el tipo de reporte',
            'fechaInicio.required' => 'Es necesario ingresar la fecha inicio del reporte',
            'fechaFin.required' => 'Es necesario ingresar la fecha fin del reporte'

        ];
        $rules = [
            'tipo_reporte'=> 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required'

        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior

        session(['fechaInicio' => $request->input('fechaInicio')]);
        session(['fechaFin' => $request->input('fechaFin')]);
        if($request['tipo_reporte'] == 1)
        {
            return $this->rclient_ads($request);
        }
        if($request['tipo_reporte'] == 2)
        {
           return $this->rclient_seller($request);
        }
        if($request['tipo_reporte'] == 3)
        {
            return $this->rseller_sales($request);
        }
    }


    protected function rclient_ads(Request $request)
    {
            $data = DB::table('clients')->join('anuncios', 'clients.anuncio_id','=','anuncios.id')
            ->select(
                DB::raw('anuncios.nombre as anuncio'),
                DB::raw('count(*) as number'))
            ->where('anuncios.created_at', '>', $request['fechaInicio'].' 00:00:00')
            ->where('anuncios.created_at', '<=', $request['fechaFin'].' 23:59:59')
            ->groupBy('anuncio')->get();

        $array[] = ['Anuncio', 'Cantidad'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->anuncio, $value->number];
        }
        return view('report.clientesxanuncio')->with('anuncio', json_encode($array));
    }

    //tabla reporte Clientes x Anuncio
    function fetch_data2(Request $request)
    {

        $data = Anuncio::With('clients')
            ->where('anuncios.created_at', '>', session('fechaInicio').' 00:00:00')
            ->where('anuncios.created_at', '<=', session('fechaFin').' 23:59:59')
            ->get();


        echo json_encode($data);
    }


    protected function rclient_seller(Request $request)
    {
        $data = DB::table('clients')->join('sellers', 'clients.seller_id','=','sellers.id')
            ->join('users', 'sellers.user_id','=','users.id')
            ->select(
                DB::raw('users.name as vendedor'),
                DB::raw('count(*) as number'))
            ->where('clients.created_at', '>', $request['fechaInicio'].' 00:00:00')
            ->where('clients.created_at', '<=', $request['fechaFin'].' 23:59:59')
            ->groupBy('vendedor')
            ->get();
        $array[] = ['Vendedor', 'Clientes Asignados'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->vendedor, $value->number];
        }

        return view('report.clientesxgestor')->with('sellers', json_encode($array));
    }


    function fetch_data3(Request $request)
    {
        $data = Seller::with('clients')->with('user')
            ->whereHas('clients', function($q){
                $q->where('created_at','>',session('fechaInicio').' 00:00:00')
                    ->where('created_at', '<=', session('fechaFin').' 23:59:59');
            })->get();

        echo json_encode($data);

    }

    protected function rseller_sales(Request $request)
    {
        $seller_sales = $clients_month= Client::select(
            DB::raw('count(*) as clients'),
            DB::raw("DATE_FORMAT(created_at,'%M') as months")
        )
            ->groupBy('months')
            ->orderBy('id')
            ->get();
            ->where('updated_at', '>', $request['fechaInicio'].' 00:00:00')
            ->where('updated_at', '<=', session('fechaFin').' 23:59:59')
            ->get();
        $jseller_sales = json_encode($seller_sales);
        dd($jseller_sales);

        return view('report.seller_sales',compact('jseller_sales'));
    }
}
