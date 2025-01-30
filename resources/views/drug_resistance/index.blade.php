@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Results')
@section('subtitle', '')
@section("content")
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        {{ $drug_resistances->count() }} {{ $index_status }} 
                                    </div>
                                </div>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="tabs">
                            <ul role="tablist" class="nav nav-tabs">
                                @foreach($statuses as $status)
                                    <li role="presentation" class="nav-item {{ trim($index_status) == trim($status) ? 'active show' : '' }}">
                                        <a class="nav-link {{ trim($index_status) == trim($status) ? 'active' : '' }}" id="{{$status}}-tab" href="/drug_resistance?status={{$status}}">{{ ucfirst($status) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="table-responsive table-full-width">
                            <table id="bootstrap-table" class="table table-hover table-striped">
                                <thead>
                                    <th data-field="facility_id" data-sortable="true">Facility</th>
                                    <th data-field="implementing_partner_id" data-sortable="true">IP</th>
                                    <th data-field="clinician_contact" class="text-center">Clinician Contact</th>
                                    <th data-field="art_number">Art No.</th>
                                    <th data-field="birthdate" data-sortable="true">Birth Date</th>
                                    <th data-field="vl_test_date">VL Test Date</th>
                                    <th data-field="vl_copies">VL Copies</th>
                                    <th data-field="dr_test_date">DR Test Date</th>
                                    <th data-field="dr_lab_id">DR Lab</th>
                                    <th data-field="dtg_resistance">DTG Resistance</th>
                                    <th data-field="dual" data-sortable="true">Dual</th>
                                    <th data-field="actions" class="td-actions text-center">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($drug_resistances as $dr)
                                    <tr>
                                        <td>{{ $dr->patient->facility->name ?? 'empty'}}</td>
                                        <td>{{ $dr->patient->facility->implementing_partner->name ?? 'empty'}}</td>
                                        <td>{{ $dr->patient->facility->clinician_contact ?? 'empty'}}</td>
                                        <td>{{ $dr->patient->art_number }}</td>
                                        <td>{{ $dr->patient->birthdate }}</td>
                                        <td>{{ $dr->viral_load->vl_test_date ?? '' }}</td>
                                        <td>{{ $dr->viral_load->vl_copies ?? '' }}</td>
                                        <td>{{ $dr->test_result->dr_test_date ?? '' }}</td>
                                        <td>{{ $dr->dr_lab->name }}</td>
                                        <td>
                                            {{ $dr->resistances->first()->resistance_level ?? "-NA" }}
                                        </td>
                                        <td>
                                            {{ empty($dr->test_result->rtpr_or_inti) || $dr->test_result->rtpr_or_inti == null ? 'No' : 'Yes' }}
                                        </td>
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
</div>
@endsection              
