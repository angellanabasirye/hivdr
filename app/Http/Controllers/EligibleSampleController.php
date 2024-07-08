<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEligibleSampleRequest;
use App\Http\Requests\UpdateEligibleSampleRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Models\EligibleSample;

class EligibleSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eligible_samples = EligibleSample::with(['patient', 'test_result', 'facility.implementing_partner'])
                            ->whereNotNull('eligible_sample_no')
                            ->whereHas('test_result', function(Builder $query) {
                                $query->whereNull('dr_id');
                            })
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
}
