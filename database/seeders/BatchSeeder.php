<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Batch;
use App\Models\Lab;
use Carbon\Carbon;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/batch.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Batch::create([
                    'id' => $data[0],
                    'vl_lab_id' => Lab::where('name', $data[1])->first()->id,
                    'dr_lab_id' => Lab::where('name', $data[2])->first()->id,
                    'created_at' => Carbon::parse($data[3])->toDateTimeString(),
                    'referral_date' => empty($data[4]) ? NULL : Carbon::parse($data[4])->toDateString(),
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
