<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $prefecturesCsvPath = database_path('csv/prefectures_data.csv');
        $prefecturesRows = file($prefecturesCsvPath);
        $skipRow1 = true;
        foreach ($prefecturesRows as $row) {
            if ($skipRow1) {
                $skipRow1 = false;
                continue;
            }
            $data = str_getcsv($row);
            DB::table('prefectures')->insert([
                'code' => $data[0],
                'name' => $data[1],
                'region' => $data[2],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }

        $mountainsCsvPath = database_path('csv/mountains_data.csv');
        $mountainRows = file($mountainsCsvPath);
        $skipRow1 = true;
        foreach ($mountainRows as $row) {
            if ($skipRow1) {
                $skipRow1 = false;
                continue;
            }
            $data = str_getcsv($row);
            DB::table('mountains')->insert([
                'name' => $data[0],
                'kana' => $data[1],
                'prefecture_code' => $data[2],
                'address' => $data[3],
                'latitude' => $data[4],
                'longitude' => $data[5],
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
