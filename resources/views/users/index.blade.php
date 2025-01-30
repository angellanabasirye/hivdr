@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Users')
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
                                        {{ $users->count() }} users
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-full-width">
                            <table id="bootstrap-table" class="table-sm table-hover table-striped">
                                <thead>
                                    <th data-field="facility_id" data-sortable="true">Facility</th>
                                    <th data-field="ip" data-sortable="true">IP</th>
                                    <th data-field="hub" data-sortable="true">HUB</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="email" data-sortable="true">Email</th>
                                    <th data-field="designation" data-sortable="true">Designation</th>
                                    <th data-field="details_sent">Details sent</th>
                                    <th data-field="actions" class="td-actions text-center" >Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->facility->name ?? '' }}</td>
                                        <td>{{ $user->implementing_partner->name ?? '' }}</td>
                                        <td>{{ $user->hub->name ?? '' }}</td>
                                        <td>{{ $user->name ?? '' }}</td>
                                        <td>{{ $user->email ?? '' }}</td>
                                        <td>{{ $user->designation ?? '' }}</td>
                                        <td>{{ $user->details_sent ? 'Yes' : 'No' }}</td>
                                        <td>
                                            @if(!$user->details_sent)
                                                <button class="btn btn-social btn-success btn-round encounter" style="padding: 3px;" rel="tooltip" title="Email details" data-id="{{ $user->id }}" data-url="" data-bs-toggle="modal">
                                                    <i class="fa fa-envelope"></i>
                                                </button>
                                            @else
                                                <a class="btn btn-social btn-secondary btn-round" style="cursor: default;">
                                                    <i class="fa fa-envelope-o"></i>
                                                </a>
                                            @endif
                                            <a class="btn btn-social btn-primary btn-round view_profile" id="view-{{ $user->id ?? '#' }}-link"
                                               href="{{ route('users.show', array($user->id ?? '')) }}"
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
