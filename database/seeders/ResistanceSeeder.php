<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resistance;

class ResistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientdr_drugresistance.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Resistance::create([
                    'id' => $data[0],
                    'drug_resistance_id' => $data[1],
                    'drug_type' => $data[2],
                    'drug_code' => $data[3],
                    'drug_name' => $data[4],
                    'resistance_level' => $data[5],
                    'scoring' => empty($data[6]) ? NULL : $data[6],
                    'mutaions_at_greater_than_20' => empty($data[7]) ? NULL : $data[7],
                    'mutaions_at_less_than_20' => empty($data[8]) ? NULL : $data[8],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
