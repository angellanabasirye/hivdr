@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Patient Profile')
@section('subtitle', '')
@section("content")            
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav pull-right">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle='modal' data-target='#artProfileModal'>
                                    <i class="fa fa-id-badge" aria-hidden="true"></i> ART Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle='modal' data-target='#vlModal'>
                                    <i class="fa fa-tint" aria-hidden="true"></i> Add VL
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-headphones" aria-hidden="true"></i> Social Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-search-plus" aria-hidden="true"></i> IAC History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i> Weight, MUAC, AHD
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-gear" aria-hidden="true"></i> Care Status
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted">
                                    {{ $patient->facility->name }}
                                </a>
                            </li>
                        </ul>
                        <h4 class="card-title "><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $patient->art_number }}</h4>
                    </div>
                    @include('patients._partials.modals')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">
                                            Biography
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                                style="padding: 3px; margin-bottom: 5px;" rel="tooltip" title="Edit Patient Info">
                                                <i class="fa fa-edit"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Gender:</strong>&nbsp;&nbsp;{{ $patient->gender == 'F' ? 'Female' : 'Male' }}</p>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Date of Birth:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ date('dS M Y', strtotime($patient->birthdate)) }} ({{$patient->get_age()}})
                                                    </p>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Hub:</strong>&nbsp;&nbsp;&nbsp;{{ $patient->facility->hub->name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>IP:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ (isset($patient->facility->implementing_partner)) ? $patient->facility->implementing_partner->name : "" }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Clinician Phone:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ $patient->facility->clinician_contact ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Clinician Email:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ $patient->facility->facility_email ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div> 
                            <div class="col-md-6">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="padding: 3px; margin-bottom: 5px;">
                                        <h3 class="panel-title">Medical Profile 
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
                                               style="padding: 3px;" rel="tooltip" title="Edit ART Profile">
                                                <i class="fa fa-edit"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Art Initiation Date:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ date('dS M Y', strtotime($patient->art_start_date)) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Current Regimen:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ $patient->current_regimen->regimen->name ?? $patient->current_regimen->regimen_old->regimen_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Treatment Line:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ $patient->current_regimen->treatment_line ?? null }} / 
                                                        {{ $patient->current_regimen->regimen_old->treatment_line ?? null }}
                                                    </p>
                                                </div>
                                            </div>                                               
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Recent VL Copies:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ $patient->vl_test_results->first()->vl_copies }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Recent VL Test Date:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ date('dS M Y', strtotime($patient->vl_test_results->first()->vl_test_date)) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>WHO Status:</strong>&nbsp;&nbsp;&nbsp;
                                                        @if($patient->vl_test_results->first()->eligible_sample)
                                                            {{ $patient->vl_test_results->first()->eligible_sample->who_status }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">ART History 
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                                data-toggle='modal' data-target='#artProfileModal'
                                                style="padding: 3px;" rel="tooltip" title="Add ART Info">
                                                <i class="fa fa-plus"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">                                 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Patient has had 2 consecutive Viral Loads > 1000 copies/ml:&nbsp;&nbsp;&nbsp;<strong> Yes</strong></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Patient was on art at the time of the last VL sample:&nbsp;&nbsp;&nbsp;<strong> Yes</strong></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        The most recent HIV Viral Load result (Copies/ml):&nbsp;&nbsp;&nbsp;
                                                        <strong>{{ $patient->vl_test_results->first()->vl_copies }}</strong>&nbsp;&nbsp;&nbsp;
                                                        Tested on:&nbsp;&nbsp;&nbsp;<strong>{{ date('dS M Y', strtotime($patient->vl_test_results->first()->vl_test_date)) }}</strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        Viral load result before IAC initiation (Copies/ml):&nbsp;&nbsp;&nbsp;
                                                        <strong> {{ $patient_vl_before_iac->vl_copies ?? '' }} </strong>&nbsp;&nbsp;&nbsp;
                                                        Tested on:&nbsp;&nbsp;&nbsp;
                                                        <strong>
                                                        {{ $patient_vl_before_iac ? date('dS M Y', strtotime($patient_vl_before_iac->vl_test_date)) : '' }}
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive table-full-width">
                                                                <table id="table" class="table table-striped" >
                                                                    <thead>                                                                             
                                                                        <th data-field="artline">ART Line</th>
                                                                        <th data-field="duration">Duration</th>
                                                                        <th data-field="regimen">Regimen</th>
                                                                        <th data-field="startdate" data-sortable="true">Start date</th>
                                                                        <th data-field="stopdate" data-sortable="true">Stop date</th>
                                                                        <th data-field="vlcopies">Why regimen was stopped</th>
                                                                        <th data-field="actions" class="td-actions ">Actions</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($patient->patient_regimens as $p_regimen)
                                                                        <tr>
                                                                            <td>{{ $p_regimen->regimen_old->treatment_line }}</td>
                                                                            <td>
                                                                                {{ $p_regimen->regimen_duration() ?? 'update ART history' }}
                                                                            </td>
                                                                            <td>{{ $p_regimen->regimen_old->regimen_name }}</td>
                                                                            <td>
                                                                                {{ $p_regimen->start_date ? date('dS M Y', strtotime($p_regimen->start_date)) : 'update ART history' }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $p_regimen->start_date ? ($p_regimen->stop_date ? date('dS M Y', strtotime($p_regimen->stop_date)) : 'current regimen') : '' }}
                                                                            </td>
                                                                            <td>{{ $p_regimen->regimen_change()->reasons ?? '' }} {{ $p_regimen->regimen_change()->comment ?? '' }}</td>
                                                                            <td></td>
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
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">Social Profile
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
                                               style="padding: 3px;" rel="tooltip" title="Add ART Info">
                                                <i class="fa fa-plus"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive table-full-width">
                                                                <table id="table" class="table table-striped" >
                                                                    <tbody>
                                                                        @foreach($patient->social_profiles as $profile)
                                                                            <tr>
                                                                                <td style="width: 100px;">
                                                                                    {{ date('dS M Y', strtotime($profile->profile_date)) }}
                                                                                </td>
                                                                                <td>{{ $profile->profile }}</td>
                                                                                <td>actions</td>
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
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">Virological Profile
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                                data-toggle='modal' data-target='#vlModal'
                                                style="padding: 3px;" rel="tooltip" title="Add VL">
                                                <i class="fa fa-plus"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">                                 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive table-full-width">
                                                                <table id="table" class="table table-striped" >
                                                                    <thead>                                                                             
                                                                        <th data-field="sample_collection_date">Date Sample Collected</th>
                                                                        <th data-field="vl_test_date">Test Date</th>
                                                                        <th data-field="regimen_at_vl">Regimen at time of VL</th>
                                                                        <th data-field="art_line_at_vl">ART Line at time of VL</th>
                                                                        <th data-field="vl_copies">Viral Load (copies/ml)</th>
                                                                        <th data-field="actions" class="td-actions ">Actions</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($patient->vl_test_results as $vl)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $vl->date_collected ? date('dS M Y', strtotime($vl->date_collected)) : '' }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $vl->vl_test_date ? date('dS M Y', strtotime($vl->vl_test_date)) : '' }}
                                                                                </td>
                                                                                <td>{{ $patient->regimen }}</td>
                                                                                <td>{{ $patient->treatment_line }}</td>
                                                                                <td>{{ $vl->vl_copies == 1 ? 'Not detectable' : $vl->vl_copies }}</td>
                                                                                <td></td>
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
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">IAC Sessions
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
                                               style="padding: 3px;" rel="tooltip" title="Add ART Info">
                                                <i class="fa fa-plus"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">                                 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($patient->iacs->count() < 1)
                                                        <div class="text-center" style="margin-bottom: 10px;">
                                                            <span><i>No records for IAC found</i></span>
                                                        </div>
                                                    @else
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive table-full-width">
                                                                    <table id="table" class="table table-striped" >
                                                                        <thead>                                                                             
                                                                            <th data-field="iac_date" style="width: 90px;">IAC Date</th>
                                                                            <th data-field="pss_issues">Adherence Barries</th>
                                                                            <th data-field="action_taken">Action Taken / Pyschological Support Provided</th>
                                                                            <th data-field="adherence_score" data-sortable="true" style="width: 150px">Adherence Score</th>
                                                                            <th data-field="actions" class="td-actions ">Actions</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($patient->iacs as $iac)
                                                                                <tr>
                                                                                    <td>{{ $iac->iac_date }}</td>
                                                                                    <td>
                                                                                        @foreach($pss_issues as $pss_issue)
                                                                                            @foreach(explode(",", $iac->pss_issues) as $issue)
                                                                                                @if($pss_issue->id == $issue)
                                                                                                    {{ $pss_issue->issue }}<br>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endforeach
                                                                                        @if($iac->other_issues)
                                                                                            OTHER ISSUES:{{ $iac->other_issues }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $iac->action_taken }}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $iac->adherence_score }}
                                                                                    </td>
                                                                                    <td>action here..</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">Routine Assessment
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
                                               style="padding: 3px;" rel="tooltip" title="Add ART Info">
                                                <i class="fa fa-plus"></i>                                        
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">                                 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($patient->assessments->count() <= 1)
                                                        <div class="text-center" style="margin-bottom: 10px;">
                                                            <span><i>No records for assessment found</i></span>
                                                        </div>
                                                    @else
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive table-full-width">
                                                                    <table id="table" class="table table-striped">
                                                                        <thead>                                                                             
                                                                            <th data-field="iac_date">Assessment Date</th>
                                                                            @foreach($patient->assessments as $assessment)
                                                                                <th>{{ date('dS M Y', strtotime($assessment->assessment_date)) }}</th>
                                                                            @endforeach
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($assessment_headers as $thead => $tvalue)
                                                                            <tr>
                                                                                <th>{{ $thead }}</th>
                                                                                @foreach($patient->assessments as $assessment)
                                                                                    @if($thead == 'CD4 Date' || $thead == 'CrAg Date' || $thead == 'TBLAM Date' || $thead == 'Date Weight/MUAC taken' || $thead == 'Date Added')
                                                                                        <td>
                                                                                            {{ date('dS M Y', strtotime($assessment->$tvalue)) }}
                                                                                        </td>
                                                                                    @elseif($thead == 'Recent VL Date')
                                                                                        <td>
                                                                                            {{ date('dS M Y', strtotime($assessment->viral_load->vl_test_date)) }}
                                                                                        </td>
                                                                                    @elseif($thead == 'VL Copies')
                                                                                        <td>{{ $assessment->viral_load->vl_copies }}</td>
                                                                                    @else
                                                                                        <td>{{ $assessment->$tvalue }}</td>
                                                                                    @endif
                                                                                @endforeach
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">HIV Drug Resistance
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
                                               style="padding: 3px;" rel="tooltip" title="Add ART Info">
                                                <i class="fa fa-plus"></i>                                        
                                            </a>
                                        </h3>                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="container-fluid">                                 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($patient->drug_resistances->count() <= 0)
                                                        <div class="text-center" style="margin-bottom: 10px;">
                                                            <span><i>No records for HIV drug resistance found</i></span>
                                                        </div>
                                                    @else
                                                        <div class="card">
                                                            <div class="card-body">
                                                                @foreach($patient->drug_resistances as $drug_resistance)
                                                                    <button type="button" class="btn-sm btn-block dropdown-toggle" data-toggle="collapse" data-target="#collapseExample-{{$drug_resistance->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                                        Received: {{ date('dS M Y', strtotime($drug_resistance->created_at)) }} &
                                                                        @if($drug_resistance->test_result->is_amplified)
                                                                            @if(explode(" ", $drug_resistance->decision)[0] == 'Pending')
                                                                                Pending Decision
                                                                            @else
                                                                                <b>{{ explode(" ", $drug_resistance->decision)[0] }}</b> on {{ date('dS M Y', strtotime($drug_resistance->decision_date)) }}
                                                                            @endif
                                                                        @else
                                                                            <b><i>Failed to Amplify</i></b>
                                                                        @endif
                                                                    </button>
                                                                    <br />
                                                                    <div class="collapse" id="collapseExample-{{$drug_resistance->id}}" style="margin-bottom:10px;">
                                                                        <table class="table table-bordered table-hover">
                                                                            <tbody>
                                                                                <tr style="display: none;">
                                                                                    <th colspan="{{ $drug_resistance->dr_lab_id == 5 ? 7 : 4 }}"></th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="{{ $drug_resistance->dr_lab_id == 5 ? 2 : 1 }}">
                                                                                        Lab: {{ $drug_resistance->dr_lab->name }}
                                                                                    </td>
                                                                                    <td colspan="{{ $drug_resistance->dr_lab_id == 5 ? 2 : 1 }}">
                                                                                        HIVDR Accession #: {{ $drug_resistance->test_result->dr_lab_sample_no }}</td>
                                                                                    <td colspan="{{ $drug_resistance->dr_lab_id == 5 ? 3 : 2 }}">Age: {{ $patient->get_age($drug_resistance->test_result->dr_test_date) }}</td>
                                                                                </tr>
                                                                                <tr style="background: lightgrey;">
                                                                                    <th class="text-center" colspan="{{ $drug_resistance->dr_lab_id == 5 ? 7 : 4 }}">
                                                                                        Viral Load
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sample collection date: 
                                                                                        {{ date('dS M Y', strtotime($drug_resistance->test_result->date_collected)) }}
                                                                                    </td>
                                                                                    <td>VL test date: 
                                                                                        {{ date('dS M Y', strtotime($drug_resistance->test_result->vl_test_date)) }}
                                                                                    </td>
                                                                                    <td>VL copies: {{ $drug_resistance->test_result->vl_copies }}</td>
                                                                                </tr>
                                                                                <tr style="background: lightgrey;">
                                                                                    <th class="text-center" colspan="{{ $drug_resistance->dr_lab_id == 5 ? 7 : 4 }}">
                                                                                        HIV DR
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Sample type: {{ $drug_resistance->test_result->eligible_sample->sample_type }}</td>
                                                                                    <td>HIVDR test date: 
                                                                                        {{ $drug_resistance->test_result->dr_test_date ? date('dS M Y', strtotime($drug_resistance->test_result->dr_test_date)) : '' }}
                                                                                    </td>
                                                                                    <td>Release date: 
                                                                                        {{ $drug_resistance->test_result->release_date ? date('dS M Y', strtotime($drug_resistance->test_result->release_date)) : '' }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>RT Condons Analyzed: {{ $drug_resistance->test_result->rt_condons }}</td>
                                                                                    <td>RT Sub-Type: {{ $drug_resistance->test_result->rt_sub_type }}</td>
                                                                                    <td>Regimen at time of DR test: 
                                                                                        @foreach($patient->patient_regimens as $regimen)
                                                                                            @if($regimen->regimen_at_time_of_dr_test($drug_resistance->test_result->dr_test_date))
                                                                                                {{ $regimen->regimen_old->regimen_name }}
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </td>
                                                                                </tr>
                                                                                @if($drug_resistance->dr_lab_id != 5)
                                                                                    <tr style="background: lightgrey;">
                                                                                        <th>Resistance</th>
                                                                                        <th colspan="3">Polymorphism</th>
                                                                                    </tr>
                                                                                    @foreach($drug_resistance->polymorphisms as $polymorphism)
                                                                                        <tr>
                                                                                            <td>{{ $polymorphism->classification }}</td>
                                                                                            <th colspan="3" style="font-weight: 500;">
                                                                                                {{ $polymorphism->polymorphism }}
                                                                                            </th>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endif
                                                                                <tr style="background: lightgrey;">
                                                                                    <th style="background: white;"></th>
                                                                                    <th>Drug Code</th>
                                                                                    <th>Drug Name</th>
                                                                                    <th>Resistance Level</th>
                                                                                    @if($drug_resistance->dr_lab_id == 5)
                                                                                        <th>Scoring</th>
                                                                                        <th>HIV DR Mutations at ≥ 20%</th>
                                                                                        <th>HIV DR Mutations at < 20%</th>
                                                                                    @endif
                                                                                </tr>
                                                                                @foreach($drug_resistance->resistances->groupBy('drug_type') as $type => $resistances)
                                                                                    <tr>
                                                                                        <td rowspan="{{count($resistances)+1}}">Resistance to: {{ $type }}</td>
                                                                                        <td style="display: none;"></td>
                                                                                        <td style="display: none;"></td>
                                                                                        <td style="display: none;"></td>
                                                                                        @if($drug_resistance->dr_lab_id == 5)
                                                                                            <td style="display: none;"></td>
                                                                                            <td style="display: none;"></td>
                                                                                            <td style="display: none;"></td>
                                                                                        @endif
                                                                                    </tr>
                                                                                    @foreach($resistances as $resistance)
                                                                                        <tr>
                                                                                            <td>{{ $resistance->drug_code }}</td>
                                                                                            <td>{{ $resistance->drug_name }}</td>
                                                                                            <td>{{ $resistance->resistance_level }}</td>
                                                                                            @if($drug_resistance->dr_lab_id == 5)
                                                                                                <td>{{ $resistance->scoring }}</td>
                                                                                                <td>{{ $resistance->mutations_at_greater_than_20 }}</td>
                                                                                                <td>{{ $resistance->mutations_at_less_than_20 }}</td>
                                                                                            @endif
                                                                                        </tr>
                                                                                    @endforeach
                                                                                @endforeach
                                                                                @if(count($drug_resistance->dr_comments) > 0)
                                                                                    <tr style="background: lightgrey;">
                                                                                        <th class="text-center" colspan="4">COMMENTS</th>
                                                                                    </tr>
                                                                                    <tr style="background: lightgrey;">
                                                                                        <th style="width: 25%">Type</th>
                                                                                        <th>Classification</th>
                                                                                        <th colspan="2" style="width: 55%">Release Notes</th>
                                                                                    </tr>
                                                                                    @foreach($drug_resistance->dr_comments->groupBy('comment_type') as $type =>  $classifications)
                                                                                        <tr>
                                                                                            <td rowspan="{{count($classifications)+1}}">
                                                                                                @if($type == 'prComments')
                                                                                                    PR Comments
                                                                                                @elseif($type == 'rtComments')
                                                                                                    RT Comments
                                                                                                @else
                                                                                                    INSTI
                                                                                                @endif
                                                                                            </td>
                                                                                            <td style="display: none;"></td>
                                                                                            <th colspan="2" style="display: none;"></th>
                                                                                        </tr>
                                                                                        @foreach($classifications->groupBy('drug_type') as $drug_type => $comments)
                                                                                            <tr>
                                                                                                <td>{{ $drug_type }}</td>
                                                                                                <th colspan="2" style="font-weight: 500;">
                                                                                                    @foreach($comments as $comment)
                                                                                                        {{ $comment->comment }}<br /><br />
                                                                                                    @endforeach
                                                                                                </th>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @endforeach
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                        <br />
                                                                        <div class="panel-info" style="border: 7px lavender dotted;">
                                                                            <div class="panel-heading" style="margin: 5px;">
                                                                                <h3 class="panel-title">Review Committee Decison</h3>
                                                                            </div>
                                                                            <div class="panel-body" style="padding: 10px; background-color: mintcream;">
                                                                                @if($drug_resistance->test_result->is_amplified)
                                                                                    @if($drug_resistance->decision == 'pending')
                                                                                    @else
                                                                                    <b>Committee decison made on: {{ date('dS M Y', strtotime($drug_resistance->decision_date)) }}</b>
                                                                                    <br />
                                                                                    <span class="text-muted">
                                                                                        <b>Decision:</b> {{ $drug_resistance->decision }}<br />
                                                                                        <b>Reason(s):</b> {{ $drug_resistance->regimen_change_reasons }}<br />
                                                                                        <b>Comment:</b> {{ $drug_resistance->decision_comment }}<br /><br />
                                                                                        <b>Regimen Started:</b> {{ $patient->patient_regimens->count() > 0 ? $patient->patient_regimens->first()->patient_regimen_id : "Not yet started on assigned regimen" }}
                                                                                        <br><br>
                                                                                    </span>
                                                                                    <b><u>Clinician's recommendation</u></b><br>
                                                                                    <span class="text-muted small">
                                                                                        <b>Made on:</b> {{ date('dS M Y', strtotime($drug_resistance->suggestion_date)) }}<br>
                                                                                        <b>Recommendation:</b> {{ $drug_resistance->suggested_by_clinician }}<br>
                                                                                        <b>Comment:</b> {{ $drug_resistance->suggested_comment }}<br><br>
                                                                                        Recommendation taken? <b>{{ ($drug_resistance->suggested_regimen == $drug_resistance->assigned_regimen_at_decision) ? 'Yes' : 'No' }}</b><br><br>
                                                                                        <p>Score: 
                                                                                        @if(!$drug_resistance->suggested_score)
                                                                                            <b class="badge badge-info">Not yet scored.</b>
                                                                                            <input type="number" min="0" max="100" name="" placeholder="Score this clinician between 0 and 100" style="width: 21%">
                                                                                            <button type="submit" class="btn-success">Save</button>
                                                                                        @else
                                                                                            @if($drug_resistance->suggested_score > 79.99999)
                                                                                                <b class="badge badge-success">
                                                                                            @elseif($drug_resistance->suggested_score < 79.99999 && $drug_resistance->suggested_score > 49.9999)
                                                                                                <b class="badge badge-warning">
                                                                                            @else
                                                                                                <b class="badge badge-danger">
                                                                                            @endif
                                                                                                {{ $drug_resistance->suggested_score }}</b>
                                                                                        @endif
                                                                                        </p>
                                                                                    </span>
                                                                                    @endif
                                                                                @else
                                                                                    <div>
                                                                                        <b class="text-info">This sample failed to amplify</b>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br />
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#is_past_regimen').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                $('#past_regimen_details').show();
            }
        });
        $('#is_current_regimen').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                $('#past_regimen_details').hide();
            }
        });
    });
</script>

@endsection
