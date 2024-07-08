<?php

namespace App\Observers;

use App\Models\EligibleSample;

class EligibleSampleObserver
{
    /**
     * Handle the EligibleSample "created" event.
     */
    public function created(EligibleSample $eligibleSample): void
    {
        //
    }

    /**
     * Handle the EligibleSample "updated" event.
     */
    public function updated(EligibleSample $eligibleSample): void
    {
        //
    }

    /**
     * Handle the EligibleSample "deleted" event.
     */
    public function deleted(EligibleSample $eligibleSample): void
    {
        //
    }

    /**
     * Handle the EligibleSample "restored" event.
     */
    public function restored(EligibleSample $eligibleSample): void
    {
        //
    }

    /**
     * Handle the EligibleSample "force deleted" event.
     */
    public function forceDeleted(EligibleSample $eligibleSample): void
    {
        //
    }
}
