<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'rol_id' => 1,
                'rol' => 'Admin',
            ],
            [
                'rol_id' => 2,
                'rol' => 'Comprador',
            ],
            [
                'rol_id' => 3,
                'rol' => 'Voluntario',
            ]
        ]);
    }
}
