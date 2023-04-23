<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            [
                'estado_id' => 1,
                'estado' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado_id' => 2,
                'estado' => 'Aprobado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado_id' => 3,
                'estado' => 'Finalizado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
