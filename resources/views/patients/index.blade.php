@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Patients')
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
                                    <div class="col-md-12">
                                        {{ $patients->count() }} Patients
                                    </div>
                                </div>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="tabs">
                            <ul role="tablist" class="nav nav-tabs">
                                @foreach($categories as $category)
                                    <li role="presentation" class="nav-item {{ trim($index_category) == trim($category) ? 'active show' : '' }}">
                                        <a class="nav-link {{ trim($index_category) == trim($category) ? 'active' : '' }}" id="{{$category}}-tab" href="/patients?category={{$category}}">{{ ucfirst($category) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="table-responsive table-full-width">
                            <table id="bootstrap-table" class="table table-hover table-striped">
                                <thead>
                                    <th data-field="facility_id" data-sortable="true">Facility</th>
                                    <th data-field="art_number">Art No.</th>
                                    <th data-field="age" data-sortable="true">Age</th>
                                    <th data-field="phone" class="text-center">Phone</th>
                                    <th data-field="gender" data-sortable="true">Gender</th>
                                    <th data-field="art_start_date">ART Start Date</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="is_backlog" >Is Backlog</th>
                                    <th data-field="created_by" data-sortable="true">Created By</th>
                                    <th data-field="actions" class="td-actions text-center" >Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->facility->name ?? 'empty'}}</td>                            
                                        <td>
                                            {{ $patient->art_number }}
                                            {{-- new \App\Helpers\EncryptDecrypt($patient->facility->user->username)->decrypt($patient->art_number) --}}
                                        </td>
                                        <td>{{ $patient->get_age() }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->gender }}</td>
                                        <td>{{ date('dS M Y', strtotime($patient->art_start_date)) }}</td>
                                        <td>{{ $patient->status }}</td>
                                        <td>{{ $patient->is_backlog ? 'Yes' : 'No' }}</td>
                                        <td>{{ $patient->created_by }}</td>
                                        <td>                                        
                                            <a class="btn btn-social btn-primary btn-round view_profile" id="view-{{ $patient->id}}-link"
                                               href="{{ route('patients.show', array($patient->id)) }}"
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
