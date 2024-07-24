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
                        <h4 class="card-title "><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $patient->art_number }}</h4>                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="margin-bottom: 5px;">
                                        <h3 class="panel-title">
                                            Biography
                                            <a class=" view_profile" id="view-{{$patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
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
                                                        {{ date('dS M Y', strtotime($patient->birthdate)) }} ({{$patient->getAge()}})
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
                                                    <p><strong>Clinician Phone:</strong>&nbsp;&nbsp;&nbsp;</p></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Clinician Email:</strong>&nbsp;&nbsp;&nbsp;</p></div>
                                            </div>
                                        </div>
                                    </div> <!-- ./ panel-body -->
                                </div>
                            </div> 
                            <div class="col-md-6">  
                                <div class="panel panel-info">  <!-- Patient Details -->
                                    <div class="panel-heading" style="padding: 3px; margin-bottom: 5px;">
                                        <h3 class="panel-title">ART Profile 
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
                                                        {{ $patient->current_regimen ?? $patient->old_regimen }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>
                                                        <strong>Treatment Line:</strong>&nbsp;&nbsp;&nbsp;
                                                        {{ $patient->current_regimen->treatment_line ?? null }} / 
                                                        {{ $patient->old_regimen->treatment_line ?? null }}
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
                                                        {{ $patient->vl_test_results->first()->eligible_sample->who_status }}
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
                                                        Tested on:&nbsp;&nbsp;&nbsp;<strong>{{ date('dS M Y', strtotime($patient_vl_before_iac->vl_test_date)) ?? '' }}</strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card bootstrap-table">
                                                        <div class="card-body table-full-width">
                                                            <table id="table" class="table text-left" >
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
                                                                </tbody>
                                                            </table>
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
                                                    <div class="card bootstrap-table">
                                                        <div class="card-body table-full-width">
                                                            <table id="table" class="table text-left" >
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
                                                    <div class="card bootstrap-table">
                                                        <div class="card-body table-full-width">
                                                            <table id="table" class="table text-left" >
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
                                                                            <td>{{ date('dS M Y', strtotime($vl->date_collected)) }}</td>
                                                                            <td>{{ date('dS M Y', strtotime($vl->vl_test_date)) }}</td>
                                                                            <td>{{ $patient->regimen }}</td>
                                                                            <td>{{ $patient->treatment_line }}</td>
                                                                            <td>{{ $vl->vl_copies == 1 ? 'Not detectable' : $vl->vl_copies }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
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
                                                    <div class="card">
                                                        <div class="card-body table-full-width">
                                                            <table id="table" class="table text-left" >
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
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection              
