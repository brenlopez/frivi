<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionesController extends Controller
{
    public function index(){
        $usuario_id = Auth::user()->usuario_id;

        $notificaciones = Notificacion::all();

        return view('usuario.notificaciones.notificaciones',
        array(
            'usuario_auth' => $usuario_id,
            'notificaciones'   => $notificaciones

        ));
    }

    public function enviarOferta(Request $request){
        $oferta = new Notificacion();

        $oferta->voluntario_id = $request->input('voluntario_id');
        $oferta->peticion_id = $request->input('peticion_id');

        $oferta->save();
        return redirect()->route('home')->with('status', '¡Tu oferta se envió correctamente! Te informaremos cuando el usuario acepte tu ayuda.')->with('type','success');
    }
}
