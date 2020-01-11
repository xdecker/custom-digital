<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class AnuncioController extends Controller
{
    //
    public function index()
    {
        //ver los anuncios

        $anuncios = Anuncio::paginate(10);
        return view('anuncio.index')->with(compact('anuncios'));

    }


    public function create()
    {
        //crear anuncio, mostrar formulario
        return view('anuncio.create');
    }

    public function store(Request $request)
    {
        //validar datos
        $message = [
            'nombre.required' => 'Es necesario ingresar un nombre al anuncio',
            'nombre.min' => 'El nombre del anuncio debe tener al menos 3 caracteres',
            'ubicacion.required' => 'Por favor, ingresar las ubicaciones donde esta dirigido el anuncio',
            'palabrasClaves.required' => 'Por favor, ingresar las palabras claves del público dirigido del anuncio',
            'fechaInicio.required' => 'Por favor, ingresar la fecha de inicio del anuncio',
            'fechaFin.required' => 'Por favor, ingresar la fecha de fin del anuncio',
            'presupuesto.required' => 'Por favor, ingresar el presupuesto del anuncio',
            'presupuesto.numeric' => 'Por favor, ingresar un valor de presupuesto válido',
            'presupuesto.min' => 'No se aceptan valores negativos para el presupuesto',
        ];
        $rules = [
            'nombre'=> 'required|min:3',
            'ubicacion' => 'required',
            'palabrasClaves' => 'required',
            'fechaInicio' => 'required',
            'fechaFin'=> 'required',
            'presupuesto' => 'required|numeric|min:0'

        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior
        //$company_id = auth()->user()->company_id;
        //$request->company_id = $company_id;
        $input = $request->all();
        $anuncio = Anuncio::create($input);


        return redirect()->route('anuncio')->with('success', 'Registro creado satisfactoriamente');
    }


    public function show($id)
    {
        $anuncio = Anuncio::find($id);
        return view('anuncio.edit', compact('anuncio'));
    }

    public function edit($id)
    {
        //return "Mostrar aqui el formulario de edicion con el anuncio de id $id";
        $anuncio = Anuncio::find($id);
        return view('anuncio.edit')->with(compact('anuncio')); //formulario de registro
    }

    public function update(Request $request,$id)
    {
        //validar datos
        $message = [
            'nombre.required' => 'Es necesario ingresar un nombre al anuncio',
            'nombre.min' => 'El nombre del anuncio debe tener al menos 3 caracteres',
            'ubicacion.required' => 'Por favor, ingresar las ubicaciones donde esta dirigido el anuncio',
            'palabrasClaves.required' => 'Por favor, ingresar las palabras claves del público dirigido del anuncio',
            'fechaInicio.required' => 'Por favor, ingresar la fecha de inicio del anuncio',
            'fechaFin.required' => 'Por favor, ingresar la fecha de fin del anuncio',
            'presupuesto.required' => 'Por favor, ingresar el presupuesto del anuncio',
            'presupuesto.numeric' => 'Por favor, ingresar un valor de presupuesto válido',
            'presupuesto.min' => 'No se aceptan valores negativos para el presupuesto',
        ];
        $rules = [
            'nombre'=> 'required|min:3',
            'ubicacion' => 'required',
            'palabrasClaves' => 'required',
            'fechaInicio' => 'required',
            'fechaFin'=> 'required',
            'presupuesto' => 'required|numeric|min:0'

        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior
        //registrar y almacenar nuevo anuncio
        //dd($request->all());
        $anuncios = Anuncio::find($id);
        $anuncios->nombre = $request->input('nombre');
        $anuncios->descripcion = $request->input('descripcion');
        $anuncios->ubicacion = $request->input('ubicacion');
        $anuncios->palabrasClaves = $request->input('palabrasClaves');
        $anuncios->fechaInicio = $request->input('fechaInicio');
        $anuncios->fechaFin = $request->input('fechaFin');
        $anuncios->save(); //Update
        $anuncios = Anuncio::paginate(10);

        return view('anuncio.index')->with(compact('anuncios'));
    }



}
