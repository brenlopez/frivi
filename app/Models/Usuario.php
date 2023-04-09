<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = ['nombre', 'apellido', 'dni', 'email','password','foto_perfil','rol_id'];

    public function roles()
    {
        return $this->belongsTo('App\Models\Rol','rol_id');
    }
}
