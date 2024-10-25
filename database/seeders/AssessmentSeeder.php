<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assessment;
use Carbon\Carbon;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientassessment-2.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Assessment::create([
                    'id' => $data[0],
                    'assessment_date' => empty($data[1]) ? NULL : Carbon::parse($data[1])->toDateString(),
                    'vl_id' => empty($data[2]) ? NULL : $data[2],
                    'patient_id' => empty($data[3]) ? NULL : $data[3],
                    'pss_issues' => empty($data[4]) ? NULL : $data[4],
                    'stable' => empty($data[5]) ? NULL : $data[5],
                    'hasAHD' => empty($data[6]) ? NULL : $data[6],
                    'CD4' => empty($data[7]) ? NULL : $data[7],
                    'CD4_date' => empty($data[8]) ? NULL : Carbon::parse($data[8])->toDateString(),
                    'crag' => empty($data[9]) ? NULL : $data[9],
                    'crag_date' => empty($data[10]) ? NULL : Carbon::parse($data[10])->toDateString(),
                    'tbLam' => empty($data[11]) ? NULL : $data[11],
                    'tbLam_date' => empty($data[12]) ? NULL : Carbon::parse($data[12])->toDateString(),
                    'weight_kgs' => empty($data[13]) ? NULL : $data[13],
                    'MUAC' => empty($data[14]) ? NULL : $data[14],
                    'Weight_MUAC_date' => empty($data[15]) ? NULL : Carbon::parse($data[15])->toDateString(),
                    'created_at' => empty($data[16]) ? NULL : Carbon::parse($data[16])->toDateString(),
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
