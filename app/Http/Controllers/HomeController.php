<?php

namespace App\Http\Controllers;

use App\Models\Peticion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index($busqueda = null, Request $request)
    {
        $nombre = Auth::user()->nombre;
        $apellido = Auth::user()->apellido;
        $imagen = Auth::user()->foto_perfil;
        $usuario_id = Auth::user()->usuario_id;

        $peticiones = Peticion::all();


        if(is_null($busqueda)){
            $busqueda = $request->query('busqueda');
        }

        $resultado = Peticion::where('ubicacion','LIKE','%' . $busqueda . '%')->paginate(5);


        return view('home', array(
            'nombre'       => $nombre,
            'apellido'     => $apellido,
            'imagen'       => $imagen,
            'usuario_auth' => $usuario_id,
            'peticiones'   => $peticiones,
            'busqueda'     => $resultado 
        ));
    }
}
