<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialProfile;

class SocialProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientsocialprofile.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                SocialProfile::create([
                    'id' => $data[0],
                    'patient_id' => $data[1],
                    'profile' => empty($data[3]) ? NULL : $data[3],
                    'profile_date' => empty($data[2]) ? NULL : $data[2],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
