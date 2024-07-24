<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PssIssue;

class PssIssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pss_issues_details = [
            ['Social issues', 'Non-disclosure', '2021-01-29 10:48:11'],
            ['Pyschological/Emotional issues', 'Denial/coping with results', '2021-01-29 10:48:11'],
            ['Pyschological/Emotional issues', 'Anger/Stress', '2021-01-29 10:48:11'],
            ['Social issues', 'Stigma & discrimination', '2021-01-29 10:48:11'],
            ['Pyschological/Emotional issues', 'Bereavement', '2021-01-29 10:48:11'],
            ['Social issues', 'Dysfunctional family/client support system', '2021-01-29 10:48:11'],
            ['Social issues', 'Harmful habits  (Alcohol & substance abuse)', '2021-01-29 10:48:11'],
            ['Social issues', 'Risky sexual behaviours', '2021-01-29 10:48:11'],
            ['Social issues', 'Lack of life-survival skills', '2021-01-29 10:48:11'],
            ['Social issues', 'Transition challenges', '2021-01-29 10:48:11'],
            ['Social issues', 'Economic challenges/poverty', '2021-01-29 10:48:11'],
            ['Social issues', 'Had 1 or no meal/day', '2021-01-29 10:48:11'],
            ['Social issues', 'Malnourished', '2021-01-29 10:48:11'],
            ['Spiritual issues', 'Spiritual issues  (Religious beliefs, Drug holidays etc)', '2021-01-29 10:48:11'],
            ['Pyschological/Emotional issues', 'Fear/Anxiety', '2021-01-29 10:48:11'],
        ];

        foreach ($pss_issues_details as $details) {
            PssIssue::create([
                'category' => $details[0],
                'issue' => $details[1],
                'created_at' => $details[2]
            ]);
        }
    }
}
