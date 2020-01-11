<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\User;
use App\Seller;

class SellerController extends Controller
{
    //

    public function perfil(){
        //ver el vendedor
        $id = auth()->user()->id;
        //$seller = Seller::where('user_id', '=', $id);
        $seller = Seller::with('user')
            ->where(function($query) use ($id){
                $query->where('sellers.user_id', '=', $id);
            })->paginate(10);

        //dd($seller);

        return view('seller.perfil')->with(compact('seller'));

    }


    public function index(){
        //ver los vendedores
        $sellers = Seller::Paginate(10);
        return view('seller.index')->with(compact('sellers'));
    }

    public function create(){
        return view('seller.create');
    }
}
