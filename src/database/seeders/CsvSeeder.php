<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('csv/mountains_data.csv');
        $rows = file($csvFile);
        $skipRow1 = true;

        foreach ($rows as $row) {
            if ($skipRow1) {
                $skipRow1 = false;
                continue;
            }

            $data = str_getcsv($row);
            DB::table('mountains')->insert([
                'name' => $data[0],
                'kana' => $data[1],
                'prefecture' => $data[2],
                'address' => $data[3],
                'latitude' => $data[4],
                'longitude' => $data[5],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
