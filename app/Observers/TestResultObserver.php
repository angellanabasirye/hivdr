<?php

namespace App\Observers;

use App\Models\EligibleSample;
use App\Models\TestResult;

class TestResultObserver
{
    /**
     * Handle the TestResult "created" event.
     */
    public function created(TestResult $test_result): void
    {
        // dd($test_result);
        echo "creating ".$test_result->id."\n";
        $eligible_sample = EligibleSample::find($test_result->eligible_sample_id);
        if ($eligible_sample) {
            $eligible_sample->update(['test_result_id' => $test_result->id]);
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
