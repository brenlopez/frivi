<?php

namespace App\Http\Controllers;

use App\Models\Peticion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeticionesController extends Controller
{
    public function crearPeticion()
    {
        $id = Auth::user()->usuario_id;
        
        return view('usuario.peticiones.crear', array(
            'id'    => $id
        ));
    }

    public function guardarPeticion(Request $request){
        $peticion = new Peticion();

        $peticion->titulo = $request->input('titulo');
        $peticion->descripcion = $request->input('descripcion');
        $peticion->fecha_peticion = date('YmdHis');
        $peticion->monto_maximo = $request->input('monto_maximo');
        $peticion->tiempo_maximo = $request->input('tiempo_maximo');
        $peticion->aclaracion = $request->input('aclaracion');
        $peticion->ubicacion = $request->input('ubicacion');
        $peticion->estado_id = 1;
        $peticion->usuario_id = $request->input('usuario_id');

        $peticion->save();
        return redirect()->route('home')->with('status', '¡La petición se creó con éxito!')->with('type','success');

    }
}
