<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PatientRegimen;
use Carbon\Carbon;

class PatientRegimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientregimen.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                PatientRegimen::create([
                    'patient_id' => empty($data[1]) ? NULL : $data[1],
                    'art_number' => empty($data[0]) ? NULL : $data[0],
                    'regimen_id' => NULL,
                    'regimen_old_id' => empty($data[2]) ? NULL : $data[2],
                    'start_date' => empty($data[3]) ? NULL : Carbon::parse($data[3])->toDateString(),
                    'stop_date' => empty($data[4]) ? NULL : Carbon::parse($data[4])->toDateString(),
                    'created_at' => empty($data[5]) ? NULL : Carbon::parse($data[5])->toDateString(),
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }

}
