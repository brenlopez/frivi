<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';
    protected $primaryKey = 'notificacion_id';

    protected $fillable = [ 'voluntario_id', 'peticion_id'];

    public function usuario()
    {
        return $this->belongsTo( Usuario::class,
        'voluntario_id',
        'usuario_id');
    }

    public function peticion()
    {
        return $this->belongsTo( Peticion::class,
        'peticion_id',
        'peticion_id');
    }

}

