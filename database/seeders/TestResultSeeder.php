<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibleSample;
use App\Models\TestResult;
use Carbon\Carbon;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientvl_dr_test_results.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                TestResult::create([
                    'patient_id' => $data[2],
                    'eligible_sample_id' => EligibleSample::where('eligible_sample_no', $data[4])->first()->id ?? NULL,
                    // 'test_type' => $data[22] == null ? 'viral_load' : 'drug_resistance',// viral_load, drug resistance etc
                    'vl_id' => $data[0], // viral load test id that prompted the drug resistance test
                    'vl_lab_id' => $data[6],
                    'vl_copies' => $data[9],
                    'vl_indication_id' => empty($data[11]) ? NULL : $data[11],
                    'vl_adherence' => $data[13],
                    'vl_test_date' => empty($data[8]) ? NULL : Carbon::parse($data[8])->toDateString(),
                    'dr_id' => empty($data[22]) ? NULL : $data[22],
                    'dr_lab_id' => empty($data[24]) ? NULL : $data[24],
                    'dr_lab_sample_no' => empty($data[25]) ? NULL : $data[25],
                    'dr_indication_id' => empty($data[17]) ? NULL : $data[17],
                    'rtpr_or_inti' => empty($data[26]) ? NULL : $data[26],
                    'is_amplified' => empty($data[27]) ? NULL : $data[27],
                    'dr_test_date' => empty($data[28]) ? NULL : Carbon::parse($data[28])->toDateString(),
                    'release_date' => empty($data[29]) ? NULL : Carbon::parse($data[29])->toDateString(),
                    'rt_codons' => empty($data[30]) ? NULL : $data[30],
                    'pr_codons' => empty($data[31]) ? NULL : $data[31],
                    'rt_sub_type' => empty($data[32]) ? NULL : $data[32],
                    'date_collected' => empty($data[33]) ? NULL : Carbon::parse($data[33])->toDateString()
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
