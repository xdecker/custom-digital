<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades;
use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    //

    public function index()
    {
        $estados = Estado::orderBY('id','DESC')->paginate(15);
        return view('estado.index')->with(compact('estados'));
    }


    public function create()
    {
        //crear compania, mostrar formulario
        return view('estado.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,['nombreEstado'=>'required']);
        Estado::create($request->all());
        return redirect()->route('estado.index')->with('success', 'Registro creado satisfactoriamente');
    }

    public function show($id)
    {
        $estado=Estado::find($id);
        return view('estado.edit', compact('estado'));
    }

    public function edit($id)
    {
        $estado=Estado::find($id);
        return view('estado.edit', compact ('estado'));
    }


    public function update(Request $request, $id)
    {


        $this->validate($request, ['nombreEstado'=>'required']);
        //$estados = Estado::find($id)->update($request->all());
        $estado = Estado::find($id);
        $estado->nombreEstado = $request->input('nombreEstado');
        $estado->save();
        return redirect()->route('estado.index')->with(compact('estado'), 'success', 'Registro editado exitosamente');

    }

    public function destroy($id)
    {
        Estado::find($id)->delete();
        return redirect()->route('estado.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
