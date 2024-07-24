<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IAC;

class IACSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientiac.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                IAC::create([
                    'id' => $data[0],
                    'patient_id' => $data[1],
                    'pss_issues' => empty($data[2]) ? NULL : $data[2],
                    'other_issues' => empty($data[3]) ? NULL : $data[3],
                    'iac_date' => empty($data[4]) ? NULL : $data[4],
                    'adherence_score' => empty($data[6]) ? NULL : $data[6],
                    'action_taken' => empty($data[5]) ? NULL : $data[5],
                    'created_at' => empty($data[7]) ? NULL : $data[7],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
