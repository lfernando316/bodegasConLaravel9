<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class JsonSeeder extends Seeder
{
    public function run()
    {
        $jsonFile = File::get(database_path('your_data.json'));
        $data = json_decode($jsonFile, true);

        foreach ($data as $record) {
            // Verifica si el registro ya existe para evitar duplicados
            $model = DB::table($record['model'])->where('pk', $record['pk'])->first();

            if (!$model) {
                DB::table($record['model'])->insert($record['fields']);
            }
        }
    }
}
