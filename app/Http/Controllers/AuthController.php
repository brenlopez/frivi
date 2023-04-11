<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function iniciarSesion (Request $request){

        $credenciales =[
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($credenciales)){

            Session::put('admin', true);

            $request->session()->regenerate();

            if(Auth::user()->rol_id != 2){
                return redirect()->route('admin.index')->with('status','Sesión iniciada con exito');
            }

            return redirect()->route('home')->with('status','Sesión iniciada con exito');
        }

        return redirect()
        ->route('auth.login')
        ->withInput()->with('status','Las credenciales no coinciden con nuestros registros');
    }

    public function cerrarSesion (Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('status','¡Tu sesión se cerró con éxito!');
    }
}
