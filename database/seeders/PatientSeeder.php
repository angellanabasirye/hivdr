<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use Carbon\Carbon;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patient.csv"), "r");
        // $csvFile = fopen(base_path("database/data/patient_seeder.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Patient::create([
                    'id' => $data[0],
                    'art_number' => $data[1],
                    'facility_id' => $data[2],
                    'birthdate' => empty($data[3]) ? NULL : Carbon::parse($data[3])->toDateString(),
                    'gender' => $data[4],
                    'art_start_date' => empty($data[5]) ? NULL : Carbon::parse($data[5])->toDateString(),
                    'status' => $data[6],
                    'is_backlog' => $data[7],
                    'created_by' => NULL, //$data[8],
                    'created_at' => $data[8],
                    'updated_at' => NULL, //$data[10],
                    'deleted_at' => NULL, //Carbon::parse($data[11])->toDateString(),
                ]);  
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
