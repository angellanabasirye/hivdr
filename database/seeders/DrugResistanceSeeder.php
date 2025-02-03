<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrugResistance;
use Carbon\Carbon;
use App\Helpers\ArrayHelpers;

class DrugResistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path("database/data/patientdr.csv");
        $generateRow = function($row) {
            return [
                'id' => $row[0],
                'dr_lab_id' => $row[2],
                'vl_id' => $row[3],
                'patient_id' => $row[4],
                'test_result_id' => NULL,
                'suggested_by_clinician' => empty($row[5]) ? NULL : $row[5],
                'suggestion_date' => empty($row[6]) ? NULL : Carbon::parse($row[6])->toDateString(),
                'suggested_regimen' => empty($row[7]) ? NULL : $row[7],
                'suggested_comment' => empty($row[8]) ? NULL : $row[8],
                'suggested_regimen_change_reason' => empty($row[9]) ? NULL : $row[9],
                'suggested_score' => empty($row[10]) ? NULL : $row[10],
                'decision' => empty($row[11]) ? NULL : $row[11],
                'decision_date' => empty($row[12]) ? NULL : Carbon::parse($row[12])->toDateString(),
                'reviewer_level' => empty($row[13]) ? NULL : $row[13],
                'reviewer_id' => empty($row[14]) ? NULL : $row[14],
                'assigned_regimen_at_decision' => empty($row[15]) ? NULL : $row[15],
                'art_no_after_regimen_start' => empty($row[16]) ? NULL : $row[16],
                'decision_comment' => empty($row[17]) ? NULL : $row[17],
                'regimen_change_reasons' => empty($row[18]) ? NULL : $row[18],
                'facility_notified_no_switch' => empty($row[19]) ? NULL : $row[19],
                'created_at' => Carbon::parse($row[20])->toDateTimeString(),
            ];
        };

        foreach (ArrayHelpers::chunkFile($path, $generateRow, 1000) as $chunk) {
            DrugResistance::Insert($chunk);
        }

        // $csvFile = fopen(base_path("database/data/patientdr.csv"), "r");
  
        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         DrugResistance::create([
        //             'id' => $data[0],
        //             'dr_lab_id' => $data[2],
        //             'vl_id' => $data[3],
        //             'patient_id' => $data[4],
        //             'test_result_id' => NULL,
        //             'suggested_by_clinician' => empty($data[5]) ? NULL : $data[5],
        //             'suggestion_date' => empty($data[6]) ? NULL : Carbon::parse($data[6])->toDateString(),
        //             'suggested_regimen' => empty($data[7]) ? NULL : $data[7],
        //             'suggested_comment' => empty($data[8]) ? NULL : $data[8],
        //             'suggested_regimen_change_reason' => empty($data[9]) ? NULL : $data[9],
        //             'suggested_score' => empty($data[10]) ? NULL : $data[10],
        //             'decision' => empty($data[11]) ? NULL : $data[11],
        //             'decision_date' => empty($data[12]) ? NULL : Carbon::parse($data[12])->toDateString(),
        //             'reviewer_level' => empty($data[13]) ? NULL : $data[13],
        //             'reviewer_id' => empty($data[14]) ? NULL : $data[14],
        //             'assigned_regimen_at_decision' => empty($data[15]) ? NULL : $data[15],
        //             'art_no_after_regimen_start' => empty($data[16]) ? NULL : $data[16],
        //             'decision_comment' => empty($data[17]) ? NULL : $data[17],
        //             'regimen_change_reasons' => empty($data[18]) ? NULL : $data[18],
        //             'facility_notified_no_switch' => empty($data[19]) ? NULL : $data[19],
        //             'created_at' => Carbon::parse($data[20])->toDateTimeString(),
        //         ]);    
        //     }
        //     $firstline = false;
        // }
        // fclose($csvFile);
    }
}
