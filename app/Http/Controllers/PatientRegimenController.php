<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRegimenRequest;
use App\Http\Requests\UpdatePatientRegimenRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\PatientRegimen;
use App\Models\RegimenOld;

class PatientRegimenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePatientRegimenRequest $request): RedirectResponse
    {
        $request->validate([
            'patient_id' => 'required',
            'drug_1' => 'required',
            'drug_2' => 'required',
            'drug_3' => 'required',
            'regimen_old_id' => 'required',
            'start_date' => 'required',
            'current_or_past' => 'required',
            // 'regimen_id',
            // 'stop_date',
        ]);
        dd($request);
        dd('here');

        $input = $request->all();
        $regimen = $input['drug_1'].'-'.$input['drug_2'].'-'.$input['drug_3'].($input['drug_4'] != "" ? '-'.$input['drug_4'] : "").($input['drug_5'] != "" ? '/'.$input['drug_5'] : "");
        $input['regimen_old_id'] = RegimenOld::where('regimen_name', $regimen)->first()->id;
        // dd($input);

        if (!PatientRegimen::create($input)) {
            flash('PatientRegimen not created, please try again')->error();
            return redirect()->back()
            ->withErrors('errors', 'PatientRegimen not created, please try again');
        }

        // flash('PatientRegimen created successfully')->success();
        return redirect()->route('patients.show', $input['patient_id'])
          ->with('success', 'PatientRegimen created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientRegimen $patientRegimen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientRegimen $patientRegimen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRegimenRequest $request, PatientRegimen $patientRegimen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientRegimen $patientRegimen)
    {
        //
    }
}
