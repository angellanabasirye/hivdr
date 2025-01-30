@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIVDR Batch')
@section('subtitle', '')
@section("content")            
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title ">
                            Batch: &nbsp;&nbsp;{{ $batch->dr_lab->name }} / {{ date('d-M-Y', strtotime($batch->created_at)) }} / {{ $batch->referral_date != NULL ? date('d-M-Y', strtotime($batch->referral_date)) : 'OPEN' }}
                        </h4>                        
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        {{ $batch->eligible_samples->count() }} samples in this batch
                                    </div>
                                </div>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="table-responsive table-full-width">
                            <table id="bootstrap-table" class="table table-striped">
                                <thead>
                                    <th data-field="facility_id" data-sortable="true">Facility</th>
                                    <th data-field="art_number">ART No.</th>
                                    <th data-field="gender" data-sortable="true">Gender</th>
                                    <th data-field="age" data-sortable="true">Age</th>
                                    <th data-field="locator_id">Locator ID</th>
                                    <th data-field="form_number">Form No.</th>
                                    <th data-field="vl_test_date">VL Test Date</th>
                                    <th data-field="vl_copies">VL Copies</th>
                                    <th data-field="sample_type">Sample Type</th>
                                    <th data-field="dr_lab_id">DR Lab</th>
                                    <th data-field="status">Referral Status</th>
                                    <th data-field="patient">Patient</th>
                                </thead>
                                <tbody>
                                    @foreach ($batch->eligible_samples as $sample)
                                    <tr>
                                        <td>{{ $sample->facility->name }}</td>
                                        <td>{{ $sample->patient->art_number }}</td>
                                        <td>{{ $sample->patient->gender }}</td>
                                        <td>{{ $sample->patient->get_age() }}</td>
                                        <td>{{ $sample->locator_no }}</td>
                                        <td>{{ $sample->form_number }}</td>
                                        <td>{{ $sample->vl_test_date }}</td>
                                        <td>{{ $sample->test_result->vl_copies }}</td>
                                        <td>{{ $sample->sample_type }}</td>
                                        <td>{{ $sample->dr_lab->name }}</td>
                                        <td>
                                            @if(!$batch->referral_date)
                                                <a href="#">Remove from Batch</a>
                                            @elseif($sample->accepted_at_dr)
                                                <span class='text-muted small'>Referred to {{ $sample->dr_lab->name }}<small> -{{ date('dS M Y', strtotime($sample->referred_to_dr_at)) }}</small></span>
                                            @elseif(!$sample->accepted_at_dr)
                                                <span class='text-muted small'>
                                                    {{ $sample->dr_rejection_reason }}
                                                </span>
                                            @else
                                                <span class='text-muted small'>Awaiting Referral</span>
                                            @endif
                                        </td>
                                        <td>                                        
                                            <a class="btn btn-social btn-primary btn-round view_profile" id="view-{{ $sample->patient->id}}-link"
                                               href="{{ route('patients.show', array($sample->patient->id)) }}"
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
