<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Requests\UpdateAssessmentRequest;
use App\Http\Requests\StoreAssessmentRequest;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = Assessment::withWhereHas('patient', function (Builder $query) {
                           $query->where('status', 'Alive and on treatment')
                                ->withWhereHas('latest_drug_resistance', function (Builder $query_two) {
                                    $query_two->where('decision', 'pending');
                                })
                                ->withWhereHas('latest_viral_load')
                                ->with('facility.implementing_partner');
                       })
                       ->get();
                       // dd($assessments->count());
        return view('assessments.index', compact('assessments'));
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
    public function store(StoreAssessmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssessmentRequest $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
