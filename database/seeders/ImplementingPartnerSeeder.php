<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ImplementingPartner;

class ImplementingPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partner_details = [
            [NULL, 'Mildmay Uganda', '2021-04-14 17:14:10', NULL, NULL],
            [NULL, 'Baylor ACE Rwenzori', '2021-04-14 17:16:07', NULL, NULL],
            [5, 'LPHS-East', '2021-04-14 17:16:48', NULL, NULL],
            [3, 'LPHS-EC', '2021-04-14 17:17:15', NULL, NULL],
            [NULL, 'TASO Soroti', '2021-04-14 17:17:50', NULL, NULL],
            [NULL, 'IDI Kampala', '2021-04-14 17:18:15', NULL, NULL],
            [NULL, 'Army', '2021-04-14 17:18:42', NULL, NULL],
            [NULL, 'MUWRP', '2021-04-14 17:19:10', NULL, NULL],
            [NULL, 'RHITES-SW', '2021-04-14 17:20:32', NULL, NULL],
            [NULL, 'RHSP', '2021-04-14 17:21:10', NULL, NULL],
            [2, 'LPHS-Lango', '2021-04-25 20:27:55', NULL, NULL],
            [NULL, 'IDI West Nile', '2021-04-25 21:16:25', NULL, NULL],
            [6, 'UPMB LSDA SW', '2021-04-28 21:25:17', NULL, NULL],
            [NULL, 'Baylor ACE Bunyoro', '2021-05-13 10:02:09', NULL, NULL],
            [6, 'UPMB Eface', '2021-05-13 10:03:52', NULL, NULL],
            [NULL, 'LPHS Acholi', '2021-06-22 14:38:09', NULL, NULL],
            [NULL, 'Prison', '2021-07-05 13:25:36', NULL, NULL],
            [7, 'UCMB Rwenzori Hoima', '2021-09-03 14:51:04', NULL, NULL],
            [1, 'LSP Ankole', '2021-10-25 16:19:41', NULL, NULL],
            [1, 'LSP Kigezi', '2021-10-25 16:20:42', NULL, NULL],
            [5, 'LPHS-Karamoja', '2022-02-15 13:56:49', NULL, NULL],
            [6, 'UPMB LSDA East', '2022-02-17 10:55:50', NULL, NULL],
            [6, 'UPMB LSDA North', '2022-02-17 11:08:55', NULL, NULL],
            [7, 'UCMB Masaka', '2023-01-17 10:45:36', NULL, NULL],
            [7, 'UCMB Mubende', '2023-01-17 10:46:51', NULL, NULL],
            [7, 'UCMB Soroti', '2023-01-17 10:48:26', NULL, NULL],
            [7, 'UCMB Westnile', '2023-01-17 10:51:50', NULL, NULL],
            [7, 'UCMB Kampala', '2023-01-17 11:01:03', NULL, NULL],
            [NULL, 'IDI Wakiso', '2024-01-17 17:56:02', NULL, NULL],
        ];

        foreach ($partner_details as $detail) {
            ImplementingPartner::create([
                'asp_id' => $detail[0],
                'name' => $detail[1],
                'created_at' => $detail[2],
                'updated_at' => $detail[3],
                'deleted_at' => $detail[4],
            ]);
        }
    }
}
