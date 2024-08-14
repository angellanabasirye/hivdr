@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Patients')
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
                                        <div class="form-check checkbox-inline" >
                                            <a href="#"  class="view_profile">
                                                <span>
                                                    <font size="2">All Patients&nbsp;&nbsp;<span class="badge badge-success">{{ $patients->count() }}</font></span>&nbsp;&nbsp;&nbsp;
                                                </span>
                                            </a>
                                        </div>
                                        <div class="form-check checkbox-inline">
                                            <a href="#">
                                                <span>
                                                    <font size="2">Old Data (Manually Entered) <span class="badge badge-danger"> {{ $patients->where('status', '=', 'rejected')->count()}}</font></span>&nbsp;&nbsp;&nbsp;
                                                </span>
                                            </a>
                                        </div>
                                        <div class="form-check checkbox-inline">
                                            <a href="#">
                                                <span>
                                                    <font size="2">Out of Care <span class="badge badge-danger"> {{ $patients->where('status', '=', 'rejected')->count()}}</font></span>    
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                <th data-field="facility_id" class="text-left" data-sortable="true">Facility</th>
                                <th data-field="art_number" class="text-center" >Art No.</th>
                                <th data-field="age" class="text-center" data-sortable="true">Age</th>
                                <th data-field="phone" class="text-center">Phone</th>
                                <th data-field="gender" class="text-center" data-sortable="true">Gender</th>
                                <th data-field="art_start_date" class="text-center" >ART Start Date</th>
                                <th data-field="status" class="text-center" >Status</th>
                                <th data-field="is_backlog" class="text-center" >Is Backlog</th>
                                <th data-field="created_by" class="text-center" data-sortable="true">Created By</th>
                                <th data-field="actions" class="td-actions text-center" >Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr>
                                    <!--<td></td>-->
                                    <td>{{ $patient->facility->name ?? 'empty'}}</td>                            
                                    <td>{{ $patient->art_number }}</td>
                                    <td>{{ $patient->get_age() }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ date('dS M Y', strtotime($patient->art_start_date)) }}</td>
                                    <td>{{ $patient->status }}</td>
                                    <td>{{ $patient->is_backlog}}</td>
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
@endsection              
