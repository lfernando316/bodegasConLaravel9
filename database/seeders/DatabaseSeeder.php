<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Datos para la tabla usuarios
        $usuarios = [
            [
                'nombre' => 'Nombre de Usuario 1',
                'foto' => 'ruta_a_la_foto_1.jpg',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Nombre de Usuario 2',
                'foto' => 'ruta_a_la_foto_2.jpg',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más registros de usuarios aquí
        ];

        // Datos para la tabla bodegas
        $bodegas = [
            [
                'nombre' => 'Bodega 1',
                'responsable_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bodega 2',
                'responsable' => 2,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más registros de bodegas aquí
        ];

        // Inserta los datos en las tablas correspondientes
        DB::table('usuarios')->insert($usuarios);
        DB::table('bodegas')->insert($bodegas);

        // Agrega más tablas y datos aquí
    }
}
