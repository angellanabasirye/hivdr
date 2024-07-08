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
            ['Mubende Region', NULL, NULL, '2021-04-25 18:50:48', NULL, NULL],
            ['Mbarara Region', NULL, NULL, '2021-04-25 18:52:24', NULL, NULL],
            ['Masaka Region', NULL, NULL, '2021-04-25 19:37:47', NULL, NULL],
            ['Lira Region', NULL, NULL, '2021-04-25 20:23:21', NULL, NULL],
            ['Arua Region', NULL, NULL, '2021-04-25 21:17:16', NULL, NULL],
            ['Kampala Region', NULL, NULL, '2021-04-27 11:40:01', NULL, NULL],
            ['Fortportal Region', NULL, NULL, '2021-05-13 10:08:22', NULL, NULL],
            ['Gulu Region', NULL, NULL, '2021-06-22 14:36:43', NULL, NULL],
            ['Kayunga Region', NULL, NULL, '2021-06-22 14:45:29', NULL, NULL],
            ['Moroto Region', NULL, NULL, '2021-06-23 11:23:43', NULL, NULL],
            ['Jinja Region', NULL, NULL, '2021-06-24 11:54:56', NULL, NULL],
            ['Soroti Region', NULL, NULL, '2021-06-24 11:55:29', NULL, NULL],
            ['Kabale Region', NULL, NULL, '2021-06-24 11:58:17', NULL, NULL],
            ['Hoima Region', NULL, NULL, '2021-09-24 08:22:35', NULL, NULL],
            ['Entebbe Region', NULL, NULL, '2021-11-20 09:51:46', NULL, NULL],
            ['Yumbe Region', NULL, NULL, '2021-11-20 09:52:58', NULL, NULL],
            ['Mbale Region', NULL, NULL, '2021-11-20 09:53:15', NULL, NULL],
            ['Ankole Region', NULL, NULL, '2022-03-25 11:43:19', NULL, NULL],
        ];

        foreach ($region_details as $detail) {
            Region::create([
                'name' => $detail[0],
                'dhis2_code' => $detail[1],
                'created_by' => $detail[2],
                'created_at' => $detail[3],
                'updated_at' => $detail[4],
                'deleted_at' => $detail[5],
            ]);
        }
    }
}
