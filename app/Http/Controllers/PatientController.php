<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Resistance;
use App\Models\PssIssue;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
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
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $patient_vl_before_iac = $patient->vl_before_iac();
        $pss_issues = PssIssue::all();
        $assessment_headers = [
            'PSS Issues' => 'pss_issues',
            'Is Stable' => 'stable',
            'Has AHD' => 'hasAHD',
            'CD4 Count' => 'CD4',
            'CD4 Date' => 'CD4_date',
            'CrAg' => 'crag',
            'CrAg Date' => 'crag_date',
            'TBLAM' => 'tbLam',
            'TBLAM Date' => 'tbLam_date',
            'Weight (kgs)' => 'weight_kgs',
            'MUAC' => 'MUAC',
            'Date Weight/MUAC taken' => 'Weight_MUAC_date',
            'Regimen' => 'regimen',
            'Treatment Line' => 'treatment_line',
            'Recent VL date' => 'vl_test_date',
            'VL Copies' => 'vl_copies',
            'Date Added' => 'created_at',
        ];
        $drug_types = Resistance::pluck('drug_type')->unique()->values()->all();
        return view('patients.show', compact('patient', 'patient_vl_before_iac', 'pss_issues', 'assessment_headers', 'drug_types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
