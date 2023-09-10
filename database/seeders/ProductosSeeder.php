<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Producto;
use Faker\Factory as Faker;

class ProductosSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        //crear 7 registros ficticios
        for ($i = 0; $i < 7; $i++) {
            Producto::create([
                'nombre' => $faker ->word,
                'descripcion' => $faker->sentence,
                'estado'=> $faker->boolean,
            ]);
        }
    }
}
