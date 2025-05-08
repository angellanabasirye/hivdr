<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEligibleSampleRequest;
use App\Http\Requests\UpdateEligibleSampleRequest;
// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\EligibleSample;
use Illuminate\Http\Request;
use App\Models\Batch;
use Carbon\Carbon;
use Auth;

class EligibleSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eligible_samples = EligibleSample::with(['patient.latest_regimen', 'facility.implementing_partner', 'test_result' => function(Builder $query) {
                                $query->whereNull('dr_id');
                            }])
                            ->where('vl_source', 'LIMS')
                            ->whereNotNull('eligible_sample_no')
                            ->whereNull('dr_rejection_reason')
                            ->whereNull('dr_defer_reason')
                            ->whereNull('batch_id')
                            ->whereNull('accepted_at_dr')
                            ->get();
        $open_batch = Batch::get_open_batch();
        if ($open_batch == null) { // create new batch if there is no open batch
            $batch = Batch::create([
                'vl_lab_id' => 3, // UNHLS
                'dr_lab_id' => 5, // CPHL
            ]);
            $open_batch = $batch;
        }

        $user = Auth::user();

        return view('eligible_samples.index', compact('eligible_samples', 'open_batch', 'user'));
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
        $base_query = EligibleSample::with(['patient', 'facility.implementing_partner'])
                            ->withWhereHas('test_result', function ($query) {
                                $query->whereNull('dr_id');
                            })
                            ->where('vl_source', 'LIMS')
                            ->whereNotNull('eligible_sample_no');

        if (!isset($index_status)) {
            $index_status = 'referred';
        }

        if ($index_status == 'referred') {
            $base_query = $base_query->whereNotNull('referred_to_dr_at')->where('accepted_at_dr', 1);
        } elseif ($index_status == 'deferred') {
            $base_query  = $base_query->whereNotNull('dr_defer_reason');
        } elseif ($index_status == 'rejected') {
            $base_query = $base_query->whereNotNull('referred_to_dr_at')->whereNull('accepted_at_dr')->whereNull('dr_defer_reason');
        }
        
        $eligible_samples = $base_query->orderBy('vl_test_date', 'desc')->get();
        $statuses = ['referred', 'deferred', 'rejected'];
        return view('referrals_deferrals.index', compact('eligible_samples', 'index_status', 'statuses'));
    }

    public function remove_from_batch(Request $request, EligibleSample $eligible_sample)
    {
        $eligible_sample->update([
            'batch_id' => null,
            'referred_to_dr_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function refer_or_defer(Request $request, EligibleSample $eligible_sample)
    {
        $batch = Batch::whereNull('referral_date')->first();

        if ($request->refer_defer == "refer") {
            $eligible_sample->update([
                'batch_id' => $batch->id,
                'referred_by' => Auth::user()->id,
                'referred_to_dr_at' => Carbon::now(),
            ]);
        } elseif ($request->refer_defer == "defer_used_up") {
            $eligible_sample->update([
                'dr_defer_reason' => 'Used up',
                'deferred_by' => Auth::user()->id,
                'deferred_at' => Carbon::now(),
            ]);
        } elseif ($request->refer_defer == "defer_below_threshold") {
            $eligible_sample->update([
                'dr_defer_reason' => 'Below threshold',
                'deferred_by' => Auth::user()->id,
                'deferred_at' => Carbon::now(),
            ]);
        }

        return redirect()->back();
    }
}
