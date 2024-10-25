@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Referrals')
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
                                        {{ $eligible_samples->count() }} {{ $index_status }} 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs">
                            <ul role="tablist" class="nav nav-tabs">
                                @foreach($statuses as $status)
                                    <li role="presentation" class="nav-item {{ trim($index_status) == trim($status) ? 'active show' : '' }}">
                                        <a class="nav-link {{ trim($index_status) == trim($status) ? 'active' : '' }}" id="{{$status}}-tab" href="/referrals_deferrals/{{$status}}">{{ ucfirst($status) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                <th data-field="facility_id" class="text-center" data-sortable="true">Facility</th>
                                <th data-field="ip" class="text-center" data-sortable="true">IP</th>
                                <th data-field="art_number" class="text-center" >Art No.</th>
                                <th data-field="gender" class="text-center" data-sortable="true">Gender</th>
                                <th data-field="birthdate" class="text-center" data-sortable="true">Birth Date</th>
                                <th data-field="treatment_line" class="text-center" data-sortable="true">ART Line</th>
                                <th data-field="locator_no" class="text-center">Locator No.</th>
                                <th data-field="form_number" class="text-center" >Form No.</th>
                                <th data-field="vl_test_date" class="text-center" >VL Test Date</th>
                                <th data-field="vl_copies" class="text-center" >VL Copies</th>
                                <th data-field="sample_type" class="text-center" >Sample Type</th>
                                <th data-field="actions" class="td-actions text-center" >Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($eligible_samples as $eligible_sample)
                                <tr>
                                    <!--<td></td>-->
                                    <td>{{ $eligible_sample->facility->name ?? '' }}</td>
                                    <td>{{ $eligible_sample->facility->implementing_partner->name ?? '' }}</td>
                                    <td>{{ $eligible_sample->patient->art_number ?? '' }}</td>
                                    <td>{{ $eligible_sample->patient->gender ?? '' }}</td>
                                    <td>{{ $eligible_sample->patient->birthdate ?? '' }}</td>
                                    <td>{{ $eligible_sample->patient->treatment_line ?? 'N/A' }}</td>
                                    <td>{{ $eligible_sample->locator_no }}</td>
                                    <td>{{ $eligible_sample->form_number }}</td>
                                    <td>{{ $eligible_sample->vl_test_date }}</td>
                                    <td>{{ $eligible_sample->test_result->vl_copies ?? '' }}</td>
                                    <td>{{ $eligible_sample->sample_type }}</td>
                                    <td>                                        
                                        <button class="btn btn-social btn-success btn-round batch_defer" style="padding: 3px;" rel="tooltip" title="Batch(Refer)/ Defer" data-id="{{ $eligible_sample->id }}" data-url="" data-bs-toggle="modal">
                                            <i class="fa fa-cube"></i>
                                        </button>
                                        <a class="btn btn-social btn-primary btn-round view_profile" id="view-{{ $eligible_sample->patient->id ?? '#' }}-link"
                                           href="{{ route('patients.show', array($eligible_sample->patient->id ?? '')) }}"
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
