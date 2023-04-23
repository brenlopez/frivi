<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $nombre = Auth::user()->nombre;
        $apellido = Auth::user()->apellido;
        $imagen = Auth::user()->foto_perfil;
        
        return view('home', array(
            'nombre'    => $nombre,
            'apellido'  => $apellido,
            'imagen'  => $imagen
        ));
    }
}
