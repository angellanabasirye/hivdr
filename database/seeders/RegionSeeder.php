<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $region_details = [
            [1, 'Mubende Region', NULL, NULL, '2021-04-25 18:50:48', NULL, NULL],
            [2, 'Mbarara Region', NULL, NULL, '2021-04-25 18:52:24', NULL, NULL],
            [3, 'Masaka Region', NULL, NULL, '2021-04-25 19:37:47', NULL, NULL],
            [4, 'Lira Region', NULL, NULL, '2021-04-25 20:23:21', NULL, NULL],
            [5, 'Arua Region', NULL, NULL, '2021-04-25 21:17:16', NULL, NULL],
            [6, 'Kampala Region', NULL, NULL, '2021-04-27 11:40:01', NULL, NULL],
            [7, 'Fortportal Region', NULL, NULL, '2021-05-13 10:08:22', NULL, NULL],
            [8, 'Gulu Region', NULL, NULL, '2021-06-22 14:36:43', NULL, NULL],
            [9, 'Kayunga Region', NULL, NULL, '2021-06-22 14:45:29', NULL, NULL],
            [11, 'Moroto Region', NULL, NULL, '2021-06-23 11:23:43', NULL, NULL],
            [13, 'Jinja Region', NULL, NULL, '2021-06-24 11:54:56', NULL, NULL],
            [14, 'Soroti Region', NULL, NULL, '2021-06-24 11:55:29', NULL, NULL],
            [20, 'Kabale Region', NULL, NULL, '2021-06-24 11:58:17', NULL, NULL],
            [21, 'Hoima Region', NULL, NULL, '2021-09-24 08:22:35', NULL, NULL],
            [22, 'Entebbe Region', NULL, NULL, '2021-11-20 09:51:46', NULL, NULL],
            [23, 'Yumbe Region', NULL, NULL, '2021-11-20 09:52:58', NULL, NULL],
            [24, 'Mbale Region', NULL, NULL, '2021-11-20 09:53:15', NULL, NULL],
            [25, 'Ankole Region', NULL, NULL, '2022-03-25 11:43:19', NULL, NULL],
        ];

        foreach ($region_details as $detail) {
            Region::create([
                'id'         => $detail[0],
                'name'       => $detail[1],
                'dhis2_code' => $detail[2],
                'created_by' => $detail[3],
                'created_at' => $detail[4],
                'updated_at' => $detail[5],
                'deleted_at' => $detail[6],
            ]);
        }
    }
}
