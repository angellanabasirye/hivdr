<?php

namespace App\Observers;

use App\Models\DrugResistance;
use App\Models\EligibleSample;
use App\Models\TestResult;
use App\Models\ViralLoad;

class TestResultObserver
{
    /**
     * Handle the TestResult "created" event.
     */
    public function created(TestResult $test_result): void
    {
        echo "creating ".$test_result->id."\n";
        $eligible_sample = EligibleSample::find($test_result->eligible_sample_id);
        if ($eligible_sample) {
            $eligible_sample->update(['test_result_id' => $test_result->id]);
            // viral load update
            $viral_load = ViralLoad::where('eligible_sample_id', $eligible_sample->id)->first();
            $viral_load->update(['test_result_id' => $test_result->id]);
            // Drug Resistance update
            $drug_resistance = DrugResistance::where('vl_id', $viral_load->id)->first();
            if ($drug_resistance) {
                $drug_resistance->update(['test_result_id' => $test_result->id]);
            }
        }
    }

    /**
     * Handle the TestResult "updated" event.
     */
    public function updated(TestResult $test_result): void
    {
        //
    }

    /**
     * Handle the TestResult "deleted" event.
     */
    public function deleted(TestResult $test_result): void
    {
        //
    }

    /**
     * Handle the TestResult "restored" event.
     */
    public function restored(TestResult $test_result): void
    {
        //
    }

    /**
     * Handle the TestResult "force deleted" event.
     */
    public function forceDeleted(TestResult $test_result): void
    {
        //
    }
}
