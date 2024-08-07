<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegimenChange;

class RegimenChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/regimen_change.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                RegimenChange::create([
                    'patient_id' => empty($data[4]) ? NULL : $data[4],
                    'patient_regimen_id' => empty($data[1]) ? NULL : $data[1],
                    'from_regimen' => NULL,
                    'to_regimen' => NULL,
                    'reasons' => empty($data[2]) ? NULL : $data[2],
                    'comment' => empty($data[3]) ? NULL : $data[3],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
