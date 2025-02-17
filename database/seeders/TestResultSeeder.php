<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibleSample;
use App\Models\DrugResistance;
use App\Models\TestResult;
use App\Models\ViralLoad;
use Carbon\Carbon;
use App\Helpers\ArrayHelpers;

class TestResultSeeder extends Seeder
{
    protected $sample_ids;

    public function __construct()
    {
        $this->sample_ids = EligibleSample::whereNotNull('eligible_sample_no')->pluck('eligible_sample_no', 'id')->all();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path("database/data/patientvl_dr_test_results.csv");
        $generateRow = function($row) {
            return [
                'patient_id' => $row[2],
                'eligible_sample_id' => ArrayHelpers::getIdFromList($row[4], $this->sample_ids),
                'vl_id' => $row[0], // viral load test id that prompted the drug resistance test
                'vl_lab_id' => $row[6],
                'vl_copies' => $row[9],
                'vl_indication_id' => empty($row[11]) ? NULL : $row[11],
                'vl_adherence' => $row[13],
                'vl_test_date' => empty($row[8]) ? NULL : Carbon::parse($row[8])->toDateString(),
                'dr_id' => empty($row[22]) ? NULL : $row[22],
                'dr_lab_id' => empty($row[24]) ? NULL : $row[24],
                'dr_lab_sample_no' => empty($row[25]) ? NULL : $row[25],
                'dr_indication_id' => empty($row[17]) ? NULL : $row[17],
                'rtpr_or_inti' => empty($row[26]) ? NULL : $row[26],
                'is_amplified' => $row[27] != 0 && empty($row[27]) ? NULL : $row[27],
                'dr_test_date' => empty($row[28]) ? NULL : Carbon::parse($row[28])->toDateString(),
                'release_date' => empty($row[29]) ? NULL : Carbon::parse($row[29])->toDateString(),
                'rt_codons' => empty($row[30]) ? NULL : $row[30],
                'pr_codons' => empty($row[31]) ? NULL : $row[31],
                'rt_sub_type' => empty($row[32]) ? NULL : $row[32],
                'date_collected' => empty($row[33]) ? NULL : Carbon::parse($row[33])->toDateString(),
            ];
        };

        foreach (ArrayHelpers::chunkFile($path, $generateRow, 1000) as $chunk) {
            TestResult::Insert($chunk);
        }

        // update EligibleSample, ViralLoad and DrugResistance with test_result_id
        foreach (TestResult::all() as $test_result) {
            $eligible_sample = EligibleSample::find($test_result->eligible_sample_id);
            if ($eligible_sample) {
                $eligible_sample->update(['test_result_id' => $test_result->id]);
                // viral load update
                $viral_load = ViralLoad::where('eligible_sample_id', $eligible_sample->id)->first();
                $viral_load->update(['test_result_id' => $test_result->id]);
                // Drug Resistance update
                $drug_resistance = DrugResistance::where('vl_id', $viral_load->id)->first();
                if ($drug_resistance) {
                    $drug_resistance->update(['test_result_id' => $test_result->id]);
                }
            }
        }

        // $csvFile = fopen(base_path("database/data/patientvl_dr_test_results.csv"), "r");
  
        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         TestResult::create([
        //             'patient_id' => $data[2],
        //             'eligible_sample_id' => EligibleSample::where('eligible_sample_no', $data[4])->first()->id ?? NULL,
        //             // 'test_type' => $data[22] == null ? 'viral_load' : 'drug_resistance',// viral_load, drug resistance etc
        //             'vl_id' => $data[0], // viral load test id that prompted the drug resistance test
        //             'vl_lab_id' => $data[6],
        //             'vl_copies' => $data[9],
        //             'vl_indication_id' => empty($data[11]) ? NULL : $data[11],
        //             'vl_adherence' => $data[13],
        //             'vl_test_date' => empty($data[8]) ? NULL : Carbon::parse($data[8])->toDateString(),
        //             'dr_id' => empty($data[22]) ? NULL : $data[22],
        //             'dr_lab_id' => empty($data[24]) ? NULL : $data[24],
        //             'dr_lab_sample_no' => empty($data[25]) ? NULL : $data[25],
        //             'dr_indication_id' => empty($data[17]) ? NULL : $data[17],
        //             'rtpr_or_inti' => empty($data[26]) ? NULL : $data[26],
        //             'is_amplified' => $data[27] != 0 && empty($data[27]) ? NULL : $data[27],
        //             'dr_test_date' => empty($data[28]) ? NULL : Carbon::parse($data[28])->toDateString(),
        //             'release_date' => empty($data[29]) ? NULL : Carbon::parse($data[29])->toDateString(),
        //             'rt_codons' => empty($data[30]) ? NULL : $data[30],
        //             'pr_codons' => empty($data[31]) ? NULL : $data[31],
        //             'rt_sub_type' => empty($data[32]) ? NULL : $data[32],
        //             'date_collected' => empty($data[33]) ? NULL : Carbon::parse($data[33])->toDateString()
        //         ]);    
        //     }
        //     $firstline = false;
        // }
        // fclose($csvFile);
    }
}
