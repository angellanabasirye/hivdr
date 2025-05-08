@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Eligible Samples')
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
                                        {{ $eligible_samples->count() }} eligible samples
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-full-width">
                            <table id="bootstrap-table" class="table table-hover table-striped">
                                <thead>
                                    <th data-field="facility_id" data-sortable="true">Facility</th>
                                    <th data-field="ip" data-sortable="true">IP</th>
                                    <th data-field="art_number">Art No.</th>
                                    <th data-field="gender" data-sortable="true">Gender</th>
                                    <th data-field="birthdate" data-sortable="true">Birth Date</th>
                                    <th data-field="treatment_line" data-sortable="true">ART Line</th>
                                    <th data-field="locator_no">Locator No.</th>
                                    <th data-field="form_number">Form No.</th>
                                    <th data-field="vl_test_date">VL Test Date</th>
                                    <th data-field="vl_copies">VL Copies</th>
                                    <th data-field="sample_type">Sample Type</th>
                                    <th data-field="actions" class="td-actions text-center">Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($eligible_samples as $eligible_sample)
                                    <tr>
                                        <td style="text-overflow: wrap;">{{ $eligible_sample->facility->name ?? '' }}</td>
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
                                            @include('eligible_samples._partials.modals')
                                            <button class="btn btn-social btn-success btn-round batch_defer" style="padding: 2px;" rel="tooltip" title="Batch(Refer)/ Defer" data-id="{{ $eligible_sample->id }}" data-url="" data-toggle="modal" data-target="#batchModal-{{$eligible_sample->id}}">
                                                <i class="fa fa-cube"></i>
                                            </button>
                                            <button class="btn btn-social btn-dark btn-round new_sample" style="padding: 2px;" rel="tooltip" title="New Sample" data-id="{{ $eligible_sample->id }}" data-url="" data-bs-toggle="modal">
                                                <i class="fa fa-tint"></i>
                                            </button>
                                            @if($eligible_sample->facility->user && !$eligible_sample->facility->user->details_sent)
                                                <button class="btn btn-social btn-success btn-round encounter" style="padding: 2px;" rel="tooltip" title="Email details" data-id="{{ $user->id }}" data-url="" data-bs-toggle="modal">
                                                    <i class="fa fa-envelope"></i>
                                                </button>
                                            @else
                                                <a class="btn btn-social btn-secondary btn-round" style="cursor: default; padding: 2px;">
                                                    <i class="fa fa-envelope-o"></i>
                                                </a>
                                            @endif
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
</div>
@endsection              
