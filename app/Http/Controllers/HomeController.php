<?php

namespace App\Http\Controllers;

use App\Models\Peticion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $nombre = Auth::user()->nombre;
        $apellido = Auth::user()->apellido;
        $imagen = Auth::user()->foto_perfil;

        $peticiones = Peticion::all();
        
        return view('home', array(
            'nombre'    => $nombre,
            'apellido'  => $apellido,
            'imagen'  => $imagen,
            'peticiones' => $peticiones
        ));
    }
}
