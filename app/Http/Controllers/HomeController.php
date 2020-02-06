<?php

namespace App\Http\Controllers;
use App\Client;
use App\Estado;
use App\Message;
use App\Seller;
use App\Anuncio;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients_month= Client::select(
            DB::raw('count(*) as clients'),
            DB::raw("DATE_FORMAT(created_at,'%M') as months")
        )
            ->groupBy('months')
            ->orderBy('id')
            ->get();


        $jclients_month= json_encode($clients_month);


        $clients_state = DB::table('clients')->join('estados', 'clients.estado_id','=','estados.id')
            ->select(
                DB::raw('estados.nombreEstado as estado'),
                DB::raw('count(*) as cantidad'))
            ->groupBy('estado')
            ->get();

        $jclients_state= json_encode($clients_state);

        $total_clients = Client::count();

        $total_sellers = Seller::count();

        $total_ads = Anuncio::count();

        $total_mails = Message::whereMonth('created_at', '=', date('m'))
            ->count();



        return view('dashboard',compact('jclients_month','jclients_state','total_clients','total_sellers','total_ads','total_mails'));
    }
}
