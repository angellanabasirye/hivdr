<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IAC;
use Carbon\Carbon;
use App\Helpers\ArrayHelpers;

class IACSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path("database/data/patientiac.csv");
        $generateRow = function($row) {
            return [
                'id' => $row[0],
                'patient_id' => $row[1],
                'pss_issues' => empty($row[2]) ? NULL : $row[2],
                'other_issues' => empty($row[3]) ? NULL : $row[3],
                'iac_date' => empty($row[4]) ? NULL : Carbon::parse($row[4])->toDateString(),
                'adherence_score' => empty($row[6]) ? NULL : $row[6],
                'action_taken' => empty($row[5]) ? NULL : $row[5],
                'created_at' => empty($row[7]) ? NULL : Carbon::parse($row[7])->toDateString(),
            ];
        };

        foreach (ArrayHelpers::chunkFile($path, $generateRow, 1000) as $chunk) {
            IAC::Insert($chunk);
        }

        // $csvFile = fopen(base_path("database/data/patientiac.csv"), "r");
  
        // $firstline = true;
        // while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        //     if (!$firstline) {
        //         IAC::create([
        //             'id' => $data[0],
        //             'patient_id' => $data[1],
        //             'pss_issues' => empty($data[2]) ? NULL : $data[2],
        //             'other_issues' => empty($data[3]) ? NULL : $data[3],
        //             'iac_date' => empty($data[4]) ? NULL : Carbon::parse($data[4])->toDateString(),
        //             'adherence_score' => empty($data[6]) ? NULL : $data[6],
        //             'action_taken' => empty($data[5]) ? NULL : $data[5],
        //             'created_at' => empty($data[7]) ? NULL : Carbon::parse($data[7])->toDateString(),
        //         ]);    
        //     }
        //     $firstline = false;
        // }
        // fclose($csvFile);
    }
}
