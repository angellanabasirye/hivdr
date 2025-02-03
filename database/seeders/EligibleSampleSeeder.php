<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibleSample;
use Carbon\Carbon;
use App\Helpers\ArrayHelpers;

class EligibleSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path('database/data/patientvl_eligible_samples.csv');
        $generateRow = function($row) {
            return [
                'facility_id' => $row[0],
                'patient_id' => $row[1],
                'vl_source' => $row[2],
                'eligible_sample_no' => empty($row[3]) ? NULL : $row[3],
                'locator_no' => $row[5],
                'sample_type' => $row[6],
                'vl_test_date' => empty($row[7]) ? NULL : Carbon::parse($row[7])->toDateString(),
                'who_status' => $row[8],
                'dr_requested' => empty($row[9]) ? NULL : $row[9],
                'date_collected' => empty($row[10]) ? NULL : Carbon::parse($row[10])->toDateString(),
                'date_received' => empty($row[11]) ? NULL : Carbon::parse($row[11])->toDateString(),
                'approval_date' => empty($row[12]) ? NULL : Carbon::parse($row[12])->toDateString(),
                'results_upload_date' => empty($row[13]) ? NULL : Carbon::parse($row[13])->toDateString(),
                'assigned_dr_lab' => empty($row[14]) ? NULL : $row[14],
                'batch_id' => empty($row[15]) ? NULL : $row[15],
                'test_result_id' => NULL,
                'form_number' => empty($row[3]) ? NULL : preg_split('/[_]+/', $row[3])[1], // extract from number from eligibleSampleId
                'status' => NULL, // deferred, awaiting referral, referred, pending, rejected
                'deferred_at' => NULL,
                'referred_to_dr_at' => empty($row[16]) ? NULL : Carbon::parse($row[16])->toDateTimeString(),
                'accepted_at_dr' => empty($row[17]) ? NULL : $row[17],
                'dr_rejection_reason' => empty($row[18]) ? NULL : $row[18],
                'dr_defer_reason' => empty($row[19]) ? NULL : $row[19],
                'new_sample_collection_date' => empty($row[20]) ? NULL : Carbon::parse($row[20])->toDateString(),
                'deferred_by' => NULL,
                'referred_by' => NULL,
            ];
        };

        foreach (ArrayHelpers::chunkFile($path, $generateRow, 1000) as $chunk) {
            EligibleSample::Insert($chunk);
        }

    //     $csvFile = fopen(base_path("database/data/patientvl_eligible_samples.csv"), "r");
  
    //     $firstline = true;
    //     while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
    //         if (!$firstline) {
    //             EligibleSample::create([
    //                 'facility_id' => $data[0],
    //                 'patient_id' => $data[1],
    //                 'vl_source' => $data[2],
    //                 'eligible_sample_no' => empty($data[3]) ? NULL : $data[3],
    //                 'locator_no' => $data[5],
    //                 'sample_type' => $data[6],
    //                 'vl_test_date' => empty($data[7]) ? NULL : Carbon::parse($data[7])->toDateString(),
    //                 'who_status' => $data[8],
    //                 'dr_requested' => empty($data[9]) ? NULL : $data[9],
    //                 'date_collected' => empty($data[10]) ? NULL : Carbon::parse($data[10])->toDateString(),
    //                 'date_received' => empty($data[11]) ? NULL : Carbon::parse($data[11])->toDateString(),
    //                 'approval_date' => empty($data[12]) ? NULL : Carbon::parse($data[12])->toDateString(),
    //                 'results_upload_date' => empty($data[13]) ? NULL : Carbon::parse($data[13])->toDateString(),
    //                 'assigned_dr_lab' => empty($data[14]) ? NULL : $data[14],
    //                 'batch_id' => empty($data[15]) ? NULL : $data[15],
    //                 'test_result_id' => NULL,
    //                 'form_number' => empty($data[3]) ? NULL : preg_split('/[_]+/', $data[3])[1], // extract from number from eligibleSampleId
    //                 'status' => NULL, // deferred, awaiting referral, referred, pending, rejected
    //                 'deferred_at' => NULL,
    //                 'referred_to_dr_at' => empty($data[16]) ? NULL : Carbon::parse($data[16])->toDateTimeString(),
    //                 'accepted_at_dr' => empty($data[17]) ? NULL : $data[17],
    //                 'dr_rejection_reason' => empty($data[18]) ? NULL : $data[18],
    //                 'dr_defer_reason' => empty($data[19]) ? NULL : $data[19],
    //                 'new_sample_collection_date' => empty($data[20]) ? NULL : Carbon::parse($data[20])->toDateString(),
    //                 'deferred_by' => NULL,
    //                 'referred_by' => NULL,
    //             ]);    
    //         }
    //         $firstline = false;
    //     }
    //     fclose($csvFile);
    }
}
