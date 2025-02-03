<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resistance;
use App\Helpers\ArrayHelpers;

class ResistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path("database/data/patientdr_drugresistance.csv");
        $generateRow = function($row) {
            return [
                'id' => $row[0],
                'drug_resistance_id' => $row[1],
                'drug_type' => $row[2],
                'drug_code' => $row[3],
                'drug_name' => $row[4],
                'resistance_level' => $row[5],
                'scoring' => empty($row[6]) ? NULL : $row[6],
                'mutations_at_greater_than_20' => empty($row[7]) ? NULL : $row[7],
                'mutations_at_less_than_20' => empty($row[8]) ? NULL : $row[8],
            ];
        };

        foreach (ArrayHelpers::chunkFile($path, $generateRow, 1000) as $chunk) {
            Resistance::Insert($chunk);
        }

        // $csvFile = fopen(base_path("database/data/patientdr_drugresistance.csv"), "r");
  
        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         Resistance::create([
        //             'id' => $data[0],
        //             'drug_resistance_id' => $data[1],
        //             'drug_type' => $data[2],
        //             'drug_code' => $data[3],
        //             'drug_name' => $data[4],
        //             'resistance_level' => $data[5],
        //             'scoring' => empty($data[6]) ? NULL : $data[6],
        //             'mutations_at_greater_than_20' => empty($data[7]) ? NULL : $data[7],
        //             'mutations_at_less_than_20' => empty($data[8]) ? NULL : $data[8],
        //         ]);    
        //     }
        //     $firstline = false;
        // }
        // fclose($csvFile);
    }
}
