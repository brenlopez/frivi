<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesPeticionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_peticion')->insert([
            [
                'rol_id' => 1,
                'rol' => 'Comprador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rol_id' => 2,
                'rol' => 'Voluntario',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
