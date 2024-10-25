@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Cohort Tracker')
@section('subtitle', '')
@section("content")            
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card bootstrap-table">
                    <div class="card-body table-full-width">
                        <div class="toolbar">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        {{ $assessments->count() }} due for assessment
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                <th data-field="facility_id" class="text-center" data-sortable="true">Facility</th>
                                <th data-field="ip" class="text-center" data-sortable="true">IP</th>
                                <th data-field="clinician" class="text-center">Clinician</th>
                                <th data-field="art_number" class="text-center" >Art No.</th>
                                <th data-field="gender" class="text-center" data-sortable="true">Gender</th>
                                <th data-field="age" class="text-center" data-sortable="true">Age</th>
                                <th data-field="vl_test_date" class="text-center" >Recent VL Date</th>
                                <th data-field="vl_copies" class="text-center" >VL Copies</th>
                                <th data-field="vl_test_date" class="text-center" >New ART Start Date</th>
                                <th data-field="last_encounter" class="text-center">Last Encounter</th>
                                <th data-field="comment" class="text-center" >Comment</th>
                                <th data-field="actions" class="td-actions text-center" >Actions</th> <!-- Encounter, is out of care etc-->
                            </thead>
                            <tbody>
                                @foreach ($assessments as $assessment)
                                <tr>
                                    <!--<td></td>-->
                                    <td>{{ $assessment->patient->facility->name ?? '' }}</td>
                                    <td>{{ $assessment->patient->facility->implementing_partner->name ?? '' }}</td>
                                    <td>{{ $assessment->patient->facility->clinician_contact ?? '' }}</td>
                                    <td>{{ $assessment->patient->art_number ?? '' }}</td>
                                    <td>{{ $assessment->patient->gender ?? '' }}</td>
                                    <td>{{ $assessment->patient->get_age() ?? '' }}</td>
                                    <td>{{ $assessment->patient->latest_viral_load->vl_test_date }}</td>
                                    <td>{{ $assessment->patient->latest_viral_load->vl_copies ?? '' }}</td>
                                    <td>
                                        {{ $assessment->patient->current_regimen->start_date ?? '' }}
                                    </td>
                                    <td>{{ $assessment->patient->latest_viral_load->vl_test_date }}</td>
                                    <td>
                                        {{ Carbon\Carbon::now()->diffInDays($assessment->patient->latest_viral_load->vl_test_date) }}
                                    </td>
                                    <td>                                        
                                        <button class="btn btn-social btn-success btn-round encounter" style="padding: 3px;" rel="tooltip" title="Encounter" data-id="{{ $assessment->id }}" data-url="" data-bs-toggle="modal">
                                            <i class="fa fa-cube"></i>
                                        </button>
                                        <a class="btn btn-social btn-primary btn-round view_profile" id="view-{{ $assessment->patient_id ?? '#' }}-link"
                                           href="{{ route('patients.show', array($assessment->patient_id ?? '')) }}"
                                           style="padding: 3px;" rel="tooltip" title="View Profile">
                                            <i class="fa fa-user"></i>                                        
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection              
