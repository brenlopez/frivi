<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Peticion;

class ReviewsController extends Controller
{
    public function calificar(Request $request){

        $peticionId = $request->input('peticion');

        $existingReview = Review::where('peticion_id', $peticionId)->first();

        if ($existingReview) {
            $peticion = Peticion::find($peticionId);

            $peticion->estado_id = 4;
            
            $peticion->update();
        }

        $review = new Review();
        $review->rating = $request->input('estrellas');
        $review->usuario_id = $request->input('usuario');
        $review->peticion_id = $peticionId;
        $review->rol_id = $request->input('rol');
        $review->save();



        return redirect()->route('seguir.peticion', ['id' => $review->peticion_id])->with('status', '¡Calificación enviada con éxito!')->with('type','success');
    }

}
