<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\Company;
use App\User;

class CompanyController extends Controller
{
    //

    public function index()
    {
        //ver la compania

        //$companies = Company::where('id',1)->first();

        $companies = Company::paginate(10);
        return view('company.index')->with(compact('companies'));
    }


    public function create()
    {
        //crear compania, mostrar formulario
        $users = User::where('type', '=', 'noAdm')->paginate(10);
        return view('company.create')->with(compact('users'));
    }

    public function store(Request $request)
    {

        //validar datos
        $message = [
            'nombreEmpresa.required' => 'Es necesario ingresar un nombre a la empresa',
            'nombreEmpresa.min' => 'El nombre de la empresa debe tener al menos 3 caracteres',
            'tipoEmpresa.required' => 'Es necesario ingresar el tipo de la empresa',
            'telefono.required' => 'Es necesario ingresar un telefono de la empresa',
            'telefono.digits' => 'El telefono deben ser solo numeros y su longitud es de 10'
        ];
        $rules = [
            'nombreEmpresa'=> 'required|min:3',
            'tipoEmpresa' => 'required',
            'telefono'=> 'required|digits:10'

        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior


        //registrar y almacenar nueva compania
        //dd($request->all());

        $user = User::find($request->input('name_users'));
        $user->type = 'Adm';
        //$user_id->id = 1;
        //$user_id->id = $request->input('name_users');

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $nombreArchivo = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/logos/', $nombreArchivo);

        }

        $companies = new Company();
        $companies->nombreEmpresa = $request->input('nombreEmpresa');
        $companies->tipoEmpresa = $request->input('tipoEmpresa');
        $companies->telefono = $request->input('telefono');
        $companies->logo = $nombreArchivo;
        // $companies->user_id = 1;
        //$max_id = Company::whereRaw('id = (select max(`id`) from companies)')->get();
        //dd($max_id);

        $companies->save(); //Insert
        $user->company_id = $companies->id;
        $user->save();



        return redirect('/in/company/')->with('success','compania creada');
    }



    public function edit($id)
    {
        //return "Mostrar aqui el formulario de edicion con el producto de id $id";
        $companies = Company::find($id);
        return view('company.edit')->with(compact('companies')); //formulario de registro
    }


    public function update(Request $request, $id)
    {

        //validar datos
        $message = [
            'nombreEmpresa.required' => 'Es necesario ingresar un nombre a la compania',
            'nombreEmpresa.min' => 'El nombre de la empresa debe tener al menos 3 caracteres',
            'tipoEmrpesa.required' => 'Es necesario ingresar el tipo de la compania',
            'telefono.required' => 'Es necesario ingresar un telefono a la compania',
            'telefono.digits' => 'El telefono deben ser solo numeros y su longitud es de 10'
        ];
        $rules = [
            'nombreEmpresa'=> 'required|min:3',
            'tipoEmpresa' => 'required|max:200',
            'telefono'=> 'required|digits:10' //que no se ingrese negativos

        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior



        //registrar y almacenar nueva compania
        //dd($request->all());
        $companies = Company::find($id);
        $companies->nombreEmpresa = $request->input('nombreEmpresa');
        $companies->tipoEmpresa = $request->input('tipoEmpresa');
        $companies->telefono = $request->input('telefono');
        //$user = User::where('name', '=', '{request->input()');
        $companies->save(); //Update
        $companies = Company::paginate(10);

        return view('company.index')->with(compact('companies'));
    }

}
