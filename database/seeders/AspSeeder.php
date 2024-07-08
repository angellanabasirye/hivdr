<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asp;

class AspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asp_details = [
            [1,'RHITES SW', NULL, '2021-10-25 15:59:48'],
            [2,'RHITES-Lango', NULL, '2021-12-07 13:03:24'],
            [3,'RHITES-EC', NULL, '2021-12-16 14:35:54'],
            [5,'RHITES-E', NULL, '2022-02-15 13:11:13'],
            [6,'UPMB LSDA', NULL, '2022-05-04 07:52:05'],
            [7,'UCMB', NULL, '2023-01-17 10:41:49'],
        ];

        foreach ($asp_details as $detail) {
            Asp::create([
                'id' => $detail[0],
                'name' => $detail[1],
                'created_by' => $detail[2],
                'created_at' => $detail[3],
            ]);
        }
    }
}
