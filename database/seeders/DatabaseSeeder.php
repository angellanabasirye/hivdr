<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AspSeeder::class);
        $this->call(LabSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(ImplementingPartnerSeeder::class);
        $this->call(ClusterSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(HubSeeder::class);
        $this->call(LabSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(BatchSeeder::class);
        $this->call(EligibleSampleSeeder::class);
        $this->call(ViralLoadSeeder::class);
        $this->call(DrugResistanceSeeder::class);
        $this->call(TestResultSeeder::class);
        $this->call(ResistanceSeeder::class);
        $this->call(PssIssueSeeder::class);
        $this->call(IACSeeder::class);
        $this->call(SocialProfileSeeder::class);
        $this->call(RegimenOldSeeder::class);
        $this->call(PatientRegimenSeeder::class);
        $this->call(RegimenChangeSeeder::class);
    }
}
