<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    protected $table = 'peticiones';
    protected $primaryKey = 'peticion_id';

    protected $fillable = [ 'titulo','descripcion','fecha_peticion','imagen','monto_maximo','fecha_maxima','aclaracion','voluntario_id','ubicacion','estado_id', 'usuario_id'];

    public function estados()
    {
        return $this->belongsTo( Estado::class,
        'estado_id',
        'estado_id');
    }

    public function usuario()
    {
        return $this->belongsTo( Usuario::class,
        'usuario_id',
        'usuario_id');
    }

}
