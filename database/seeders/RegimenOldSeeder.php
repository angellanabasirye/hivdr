<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegimenOld;

class RegimenOldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/regimen_old.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                RegimenOld::create([
                    'id' => $data[0],
                    'regimen_name' => empty($data[1]) ? NULL : $data[1],
                    'treatment_line' => empty($data[2]) ? NULL : $data[2],
                    'age_category' => empty($data[3]) ? NULL : $data[3],
                    'created_at' => empty($data[4]) ? NULL : $data[4],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
        
    }
}
