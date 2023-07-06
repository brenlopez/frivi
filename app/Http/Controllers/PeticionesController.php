<?php

namespace App\Http\Controllers;

use App\Models\Peticion;
use App\Models\Notificacion;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $peticion->voluntario_id = null;
        $peticion->ubicacion = $request->input('ubicacion');
        $peticion->estado_id = 1;
        $peticion->usuario_id = $request->input('usuario_id');

        $peticion->save();
        return redirect()->route('home')->with('status', '¡La petición se creó con éxito!')->with('type','success');

    }

    public function aceptarVoluntario(Request $request){
        $peticion = Peticion::findOrFail($request->input('peticion_id'));

        $peticion->voluntario_id = $request->input('voluntario_id');
        $peticion->estado_id = 2;

        $peticion->update();

        $notificacion = Notificacion::where('peticion_id', $request->input('peticion') );
        $notificacion ->delete();

        $mensaje = new Notificacion();

        $mensaje->voluntario_id = $request->input('voluntario_id');
        $mensaje->peticion_id = $request->input('peticion_id');

        $mensaje->save();

        return redirect()->route('seguir.peticion', ['id' => $peticion->peticion_id])->with('status', '¡Elegiste a tu voluntario! Hacé el seguimiento del pedido aquí.')->with('type','success');
    }

    public function seguirPeticion($id)
    {
        $user = Auth::user()->usuario_id;

        // $review = Review::where('peticion_id', $id );

        $peticion = Peticion::find($id);
        return view('usuario.peticiones.seguimiento', [
            'peticion' => $peticion,
            'usuario' => $user
        ]);
    }

    public function cargarImagen(Request $request){
        $peticion = Peticion::findOrFail($request->input('peticion_id'));

        if($request->hasFile('imagen')){
            
            $imagen = $request->file('imagen');
            $peticion->imagen = date('YmdHis') . "_" . Str::slug($peticion->titulo) . "." . $imagen->extension();

            $imagen->move(public_path('assets/img/orders'), $peticion->imagen);
        }
        $peticion->estado_id = 3;
        $peticion->update();

        return redirect()->route('seguir.peticion', ['id' => $peticion->peticion_id])->with('status', '¡Tu ticket se cargó con éxito!')->with('type','success');
    }
}
