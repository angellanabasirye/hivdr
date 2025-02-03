<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EligibleSample;
use App\Models\ViralLoad;
use Carbon\Carbon;
use App\Helpers\ArrayHelpers;

class ViralLoadSeeder extends Seeder
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
        $path = base_path("database/data/patientvl.csv");
        $generateRow = function($row) {
            return [
                'id'             => $row[0],
                'eligible_sample_id' => ArrayHelpers::getIdFromList($row[3], $this->sample_ids),
                'patient_id'     => $row[2],
                'test_result_id' => NULL,
                'vl_lab_id'      => $row[5],
                'vl_source'      => $row[1],
                'vl_copies'      => $row[7],
                'vl_test_date'   => empty($row[6]) ? NULL : Carbon::parse($row[6])->toDateString(),
            ];
        };

        foreach (ArrayHelpers::chunkFile($path, $generateRow, 1000) as $chunk) {
            ViralLoad::Insert($chunk);
        }


        // $csvFile = fopen(base_path("database/data/patientvl.csv"), "r");
  
        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         ViralLoad::create([
        //             'id'             => $data[0],
        //             'eligible_sample_id' => EligibleSample::where('eligible_sample_no', $data[3])->first()->id ?? NULL,
        //             'patient_id'     => $data[2],
        //             'test_result_id' => NULL,
        //             'vl_lab_id'      => $data[5],
        //             'vl_source'      => $data[1],
        //             'vl_copies'      => $data[7],
        //             'vl_test_date'   => empty($data[6]) ? NULL : Carbon::parse($data[6])->toDateString(),
        //         ]);    
        //     }
        //     $firstline = false;
        // }
        // fclose($csvFile);
    }
}
