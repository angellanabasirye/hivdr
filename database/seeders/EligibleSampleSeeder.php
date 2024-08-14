<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibleSample;
use Carbon\Carbon;

class EligibleSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientvl_eligible_samples.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                EligibleSample::create([
                    'facility_id' => $data[0],
                    'patient_id' => $data[1],
                    'vl_source' => $data[2],
                    'eligible_sample_no' => empty($data[3]) ? NULL : $data[3],
                    'locator_no' => $data[5],
                    'sample_type' => $data[6],
                    'vl_test_date' => empty($data[7]) ? NULL : Carbon::parse($data[7])->toDateString(),
                    'who_status' => $data[8],
                    'dr_requested' => empty($data[9]) ? NULL : $data[9],
                    'date_collected' => empty($data[10]) ? NULL : Carbon::parse($data[10])->toDateString(),
                    'date_received' => empty($data[11]) ? NULL : Carbon::parse($data[11])->toDateString(),
                    'approval_date' => empty($data[12]) ? NULL : Carbon::parse($data[12])->toDateString(),
                    'results_upload_date' => empty($data[13]) ? NULL : Carbon::parse($data[13])->toDateString(),
                    'assigned_dr_lab' => empty($data[14]) ? NULL : $data[14],
                    'batch_id' => empty($data[15]) ? NULL : $data[15],
                    'test_result_id' => NULL,
                    'form_number' => empty($data[3]) ? NULL : preg_split('/[_]+/', $data[3])[1], // extract from number from eligibleSampleId
                    'status' => NULL, // deferred, awaiting referral, referred, pending, rejected
                    'deferred_at' => NULL,
                    'referred_to_dr_at' => empty($data[16]) ? NULL : Carbon::parse($data[16])->toDateTimeString(),
                    'accepted_at_dr' => empty($data[17]) ? NULL : $data[17],
                    'dr_rejection_reason' => $data[18],
                    'dr_defer_reason' => $data[19],
                    'new_sample_collection_date' => empty($data[20]) ? NULL : Carbon::parse($data[20])->toDateString(),
                    'deferred_by' => NULL,
                    'referred_by' => NULL,
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
