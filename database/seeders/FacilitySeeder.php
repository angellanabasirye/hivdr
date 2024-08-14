<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/facilities.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Facility::create([
                    'id' => $data[0],
                    'name' => $data[1],
                    'level' => $data[2],
                    'dhis2_name' => $data[6],
                    'dhis2_code' => $data[7],
                    'district_id' => $data[4],
                    'hub_id' => $data[5],
                    'implementing_partner_id' => $data[3],
                    'created_by' => NULL,
                    'created_at' => $data[11],
                    'updated_at' => NULL,
                    'deleted_at' => NULL,
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
