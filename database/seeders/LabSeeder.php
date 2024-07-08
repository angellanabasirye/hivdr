<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lab;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lab_details = [
            ['JCRC', NULL, '2021-06-10 18:49:31'],
            ['UVRI', NULL, '2021-06-10 19:25:31'],
            ['UNHLS', NULL, '2023-10-03 16:43:56'],
            ['Mildmay', NULL, '2023-10-03 16:43:56'],
            ['CPHL', NULL, '2023-10-03 16:43:56'],
            ['unclassified', NULL, NULL],
        ];

        foreach ($lab_details as $detail) {
            Lab::create([
                'name' => $detail[0],
                'created_by' => $detail[1],
                'created_at' => $detail[2],
            ]);
        }
    }
}
