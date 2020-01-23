<?php

namespace App\Http\Controllers;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //

    public function create()
    {
        return view('email.create');
    }


    public function store(Request $request){

        
        //validar datos
        $message = [
            'nombre.required' => 'Es necesario indicar el nombre del gestor',
            'asunto.required' => 'Es necesario ingresar el asunto del mensaje',
            'correo.required' => 'Es necesario ingresar el correo de destino',
            'correo.email' => 'Error, por favor ingrese un email correcto',
            'contenido.required' => 'Es necesario ingresar un contenido al mensaje'

        ];
        $rules = [
            'nombre'=> 'required',
            'asunto'=> 'required',
            'correo' => 'required|email',
            'contenido'=> 'required',


        ];
        $this->validate($request, $rules, $message); //si encuentra que una regla no cumple, redirige a la pag anterior

        $email = $request->all();

        Mail::to('xavideckza97@gmail.com')->send(new MessageReceived($email));

        return 'Mensaje enviado';
    }
}
