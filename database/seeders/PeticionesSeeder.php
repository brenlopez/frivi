<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeticionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peticiones')->insert([
            [
                'peticion_id' => 1,
                'titulo' => 'Compra en supermercado',
                'descripcion' => 'Necesito 1 caja de hamburguesas Paty de 4 unidades y mayonesa. ',
                'fecha_peticion' => '2023-06-08',
                'imagen' => null,
                'monto_maximo' => '3000.00',
                'tiempo_maximo' => 4,
                'aclaracion' => 'Tocar timbre al llegar.',
                'voluntario_id' => null,
                'ubicacion' => 'Sarmiento 123, Balvanera',
                'estado_id' => 1,
                'usuario_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peticion_id' => 2,
                'titulo' => 'Helado Cadore',
                'descripcion' => 'Quiero 1kg de Helado de Chocolate',
                'fecha_peticion' => '2023-06-08',
                'imagen' => null,
                'monto_maximo' => '2500.00',
                'tiempo_maximo' => 2,
                'aclaracion' => null,
                'voluntario_id' => null,
                'ubicacion' => 'Planes 234, Caballito',
                'estado_id' => 1,
                'usuario_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peticion_id' => 3,
                'titulo' => 'Compra en panaderia',
                'descripcion' => 'Necesito 1/2kg de pan y una docena de medialunas',
                'fecha_peticion' => '2023-06-08',
                'imagen' => null,
                'monto_maximo' => '2000.00',
                'tiempo_maximo' => 3,
                'aclaracion' => null,
                'voluntario_id' => null,
                'ubicacion' => 'Av. Santa Fe 345, Palermo',
                'estado_id' => 1,
                'usuario_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}