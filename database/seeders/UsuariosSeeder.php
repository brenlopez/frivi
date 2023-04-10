<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'usuario_id' => 1,
                'nombre' => 'Usuario',
                'apellido' => 'Admin',
                'dni' => '12.345.678',
                'email' => 'admin@gmail.com',
                'password' => \Hash::make('12345'),
                'foto_perfil' => null,
                'rol_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'nombre' => 'Julieta',
                'apellido' => 'Arias',
                'dni' => '23.456.789',
                'email' => 'juli@gmail.com',
                'password' => \Hash::make('juli123'),
                'foto_perfil' => null,
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 3,
                'nombre' => 'Brenda',
                'apellido' => 'Lopez',
                'dni' => '34.567.890',
                'email' => 'bren@gmail.com',
                'password' => \Hash::make('bren123'),
                'foto_perfil' => null,
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 4,
                'nombre' => 'Leandro',
                'apellido' => 'Vedia',
                'dni' => '45.678.901',
                'email' => 'lean@gmail.com',
                'password' => \Hash::make('lean123'),
                'foto_perfil' => null,
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
