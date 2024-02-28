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
        'name' => $data[0],
        'region' => $data[1],
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
    }
  }
}
