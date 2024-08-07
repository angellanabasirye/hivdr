<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DRComment;

class DRCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/patientdr_comments.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                DRComment::create([
                    'id' => $data[0],
                    'drug_resistance_id' => $data[1],
                    'comment_type' => $data[2],
                    'drug_type' => $data[3],
                    'comment' => $data[4],
                ]);    
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
