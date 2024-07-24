<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibleSample;
use App\Models\ViralLoad;
use Carbon\Carbon;

class ViralLoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientvl.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                ViralLoad::create([
                    'id'             => $data[0],
                    'eligible_sample_id' => EligibleSample::where('eligible_sample_no', $data[3])->first()->id ?? NULL,
                    'patient_id'     => $data[2],
                    'test_result_id' => NULL,
                    'vl_lab_id'      => $data[5],
                    'vl_source'      => $data[1],
                    'vl_copies'      => $data[7],
                    'vl_test_date'   => empty($data[6]) ? NULL : Carbon::parse($data[6])->toDateString(),
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
