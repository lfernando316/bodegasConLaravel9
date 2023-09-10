<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder

{
    public function run()
    {
        $inventarios = [
            [
                'bodega_id' => 1,
                'producto_id' => 1,
                'cantidad' => 20
            ],
            [
                'bodega_id' => 2,
                'producto_id' => 2,
                'cantidad' => 15
            ],
            [
                'bodega_id' => 3,
                'producto_id' => 3,
                'cantidad' => 30
            ],
            [
                'bodega_id' => 1,
                'producto_id' => 4,
                'cantidad' => 25
            ],
            [
                'bodega_id' => 2,
                'producto_id' => 5,
                'cantidad' => 10
            ],
            [
                'bodega_id' => 3,
                'producto_id' => 6,
                'cantidad' => 35
            ],
            [
                'bodega_id' => 1,
                'producto_id' => 7,
                'cantidad' => 40
            ]
        ];

        DB::table('inventarios')->insert($inventarios);
        
    }
}
