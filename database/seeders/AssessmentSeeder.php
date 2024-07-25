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
        $csvFile = fopen(base_path("database/data/patientassessment.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Assessment::create([
                    'id' => $data[0],
                    'assessment_date' => empty($data[1]) ? NULL : Carbon::parse($data[1])->toDateString(),
                    'vl_id' => empty($data[2]) ? NULL : $data[2],
                    'pss_issues' => empty($data[3]) ? NULL : $data[3],
                    'stable' => empty($data[4]) ? NULL : $data[4],
                    'hasAHD' => empty($data[5]) ? NULL : $data[5],
                    'CD4' => empty($data[6]) ? NULL : $data[6],
                    'CD4_date' => empty($data[7]) ? NULL : Carbon::parse($data[7])->toDateString(),
                    'crag' => empty($data[8]) ? NULL : $data[8],
                    'crag_date' => empty($data[9]) ? NULL : Carbon::parse($data[9])->toDateString(),
                    'tbLam' => empty($data[10]) ? NULL : $data[10],
                    'tbLam_date' => empty($data[11]) ? NULL : Carbon::parse($data[11])->toDateString(),
                    'weight_kgs' => empty($data[12]) ? NULL : $data[12],
                    'MUAC' => empty($data[13]) ? NULL : $data[13],
                    'Weight_MUAC_date' => empty($data[14]) ? NULL : Carbon::parse($data[14])->toDateString(),
                    'created_at' => empty($data[15]) ? NULL : Carbon::parse($data[15])->toDateString(),
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
