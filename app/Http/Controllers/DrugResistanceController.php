<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrugResistanceRequest;
use App\Http\Requests\UpdateDrugResistanceRequest;
// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\DrugResistance;
use App\Models\TestResult;
use App\Models\ViralLoad;
use Illuminate\Http\Request;

class DrugResistanceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $index_status = $request->query('status') ?? 'amplified';
        $drug_resistances = DrugResistance::withWhereHas('patient', function ($query) {
                                $query->where('status', 'Alive and on treatment');
                            })
                            ->withWhereHas('viral_load', function ($query) {
                                $query->where('vl_source', 'LIMS');
                            })
                            // ->withWhereHas('resistances', function ($query) {
                            //     $query->where('drug_code', 'DTG');
                            // })
                            ->withWhereHas('test_result', function ($query) use($index_status) {
                                if ($index_status == 'amplified') {
                                    $query->where('is_amplified', 1);
                                } else {
                                    $query->where('is_amplified', 0);
                                }
                                
                            })
                            ->where('decision', 'pending')
                            // ->groupBy('patient_id')
                            ->get();

        $statuses = ['amplified', 'failed to amplify'];
        return view('drug_resistance.index', compact('drug_resistances', 'statuses', 'index_status'));
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
    public function store(StoreDrugResistanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DrugResistance $drugResistance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DrugResistance $drugResistance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrugResistanceRequest $request, DrugResistance $drugResistance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DrugResistance $drugResistance)
    {
        //
    }

    public function discussed()
    {
        $drug_resistances = DrugResistance::withWhereHas('patient', function ($query) {
                                $query->where('status', 'Alive and on treatment');
                            })
                            ->withWhereHas('viral_load', function ($query) {
                                $query->where('vl_source', 'LIMS');
                            })
                            ->withWhereHas('resistances', function ($query) {
                                $query->where('drug_code', 'DTG');
                            })
                            ->where('decision', '<>', 'pending')
                            ->get();
        return view('drug_resistance.discussed', compact('drug_resistances'));
    }
}
