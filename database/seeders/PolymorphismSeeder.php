<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Polymorphism;

class PolymorphismSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientdr_polymorphism.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Polymorphism::create([
                    'id' => $data[0],
                    'drug_resistance_id' => $data[1],
                    'classification' => $data[2],
                    'polymorphism' => $data[3],
                    'mutations_greater_than_20' => empty($data[4]) ? NULL : $data[4],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
