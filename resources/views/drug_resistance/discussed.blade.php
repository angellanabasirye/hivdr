@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Discussed Cases')
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
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                <th data-field="facility_id" class="text-center" data-sortable="true">Facility</th>
                                <th data-field="implementing_partner_id" class="text-center" data-sortable="true">IP</th>
                                <th data-field="clinician_contact" class="text-center">Clinician Contact</th>
                                <th data-field="art_number" class="text-center" >Art No.</th>
                                <th data-field="birthdate" class="text-center" data-sortable="true">Age</th>
                                <th data-field="vl_test_date" class="text-center" >VL Test Date</th>
                                <th data-field="vl_copies" class="text-center" >VL Copies</th>
                                <th data-field="dr_test_date" class="text-center" >DR Test Date</th>
                                <th data-field="dr_lab_id" class="text-center" >DR Lab</th>
                                <th data-field="decision_date" class="text-center" >Decision Date</th>
                                <th data-field="decision" class="text-center" data-sortable="true">Decision</th>
                                <th data-field="actions" class="td-actions text-center" >Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($drug_resistances as $dr)
                                <tr>
                                    <!--<td></td>-->
                                    <td>{{ $dr->patient->facility->name ?? 'empty'}}</td>
                                    <td>{{ $dr->patient->facility->implementing_partner->name ?? 'empty'}}</td>
                                    <td>{{ $dr->patient->facility->clinician_contact ?? 'empty'}}</td>
                                    <td>{{ $dr->patient->art_number }}</td>
                                    <td>{{ $dr->patient->get_age() }}</td>
                                    <td>{{ $dr->viral_load->vl_test_date ?? '' }}</td>
                                    <td>{{ $dr->viral_load->vl_copies ?? '' }}</td>
                                    <td>{{ $dr->test_result->dr_test_date ?? '' }}</td>
                                    <td>{{ $dr->dr_lab->name }}</td>
                                    <td>{{ $dr->decision_date }}</td>
                                    <td>{{ explode(" ", $dr->decision)[0] }}</td>
                                    <td>                                        
                                        <a class="btn btn-social btn-primary btn-round view_profile" id="view-{{ $dr->patient_id}}-link"
                                           href="{{ route('patients.show', array($dr->patient_id)) }}"
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
