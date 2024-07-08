<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cluster;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cluster_details = [
            ['Nakapiripirit', 5, '2023-01-09 23:03:15'],
            ['Hoima', 14, '2023-01-10 17:37:39'],
            ['Kakumiro', 14, '2023-02-06 13:53:00'],
        ];

        foreach ($cluster_details as $detail) {
            Cluster::create([
                'name' => $detail[0],
                'implementing_partner_id' => $detail[1],
                'created_at' => $detail[2],
            ]);
        }
    }
}
