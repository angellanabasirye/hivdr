<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEligibleSampleRequest;
use App\Http\Requests\UpdateEligibleSampleRequest;
// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\EligibleSample;
use Illuminate\Http\Request;

class EligibleSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eligible_samples = EligibleSample::with(['patient', 'facility.implementing_partner', 'test_result' => function(Builder $query) {
                                $query->whereNull('dr_id');
                            }])
                            ->whereNotNull('eligible_sample_no')
                            ->get();
        return view('eligible_samples.index', compact('eligible_samples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEligibleSampleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EligibleSample $eligibleSample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EligibleSample $eligibleSample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEligibleSampleRequest $request, EligibleSample $eligibleSample)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EligibleSample $eligibleSample)
    {
        //
    }

    public function referrals_deferrals(Request $request, $index_status = null)
    {
        $base_query = EligibleSample::with(['patient', 'facility.implementing_partner', 'test_result' => function(Builder $query) {
                                $query->whereNull('dr_id');
                            }])
                            ->whereNotNull('eligible_sample_no');

        if (!isset($index_status)) {
            $index_status = 'referred';
        }

        if ($index_status == 'referred') {
            $base_query = $base_query->whereNotNull('referred_to_dr_at');
        } elseif ($index_status == 'deferred') {
            $base_query = $base_query->whereNotNull('deferred_at');
        } elseif ($index_status == 'rejected') {
            $base_query  = $base_query->whereNotNull('dr_rejection_reason');
        }
        
        $eligible_samples = $base_query->get();
        $statuses = ['referred', 'deferred', 'rejected'];
        return view('referrals_deferrals.index', compact('eligible_samples', 'index_status', 'statuses'));
    }
}
