<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends User
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = [ 'email','password','rol_id'];

    protected $hidden = ['password', 'remember_token'];
    
    public function roles()
    {
        return $this->belongsTo( Rol::class,
        'rol_id',
        'rol_id');
    }
}
