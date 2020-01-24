<?php

namespace App\Http\Controllers;
use App\Message;
use App\Seller;
use App\User;
use App\Company;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //

    public function create()
    {

        $companyid = auth()->user()->company_id;

        $company = Company::find($companyid)->first();
        return view('email.create')->with(compact('company'));
    }


    public function store(Request $request){


        //validar datos
        $message = [
            'nombre.required' => 'Es necesario indicar el nombre de la empresa',
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
        $nombreArchivo = "";
        if($request->hasFile('email_file')){
            $file = $request->file('email_file');
            $nombreArchivo = time().$file->getClientOriginalName();
            $file->move(public_path().'/email-attachments/', $nombreArchivo);

        }

        //seller id
        $seller = Seller::where('user_id', '=', auth()->user()->id)->first();
        $email = new Message();
        $email->nombre = $request->input('nombre');
        $email->asunto = $request->input('asunto');
        $email->correo = $request->input('correo');
        $email->contenido = $request->input('contenido');
        $email->attachments = $nombreArchivo;
        $email->seller_id = $seller['id'];
        $email->save();

        Mail::to($request->correo)->send(new MessageReceived($email));

        return redirect('in/sendmail')->with('success','Email enviado correctamente ');
    }
}
