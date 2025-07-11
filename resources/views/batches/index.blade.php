@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Batches')
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
                                    <div class="col-md-12 text-center">
                                        {{ $batches->count() }} batches
                                    </div>
                                </div>
                            </div>
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="table-responsive table-full-width">
                            <table id="bootstrap-table" class="table table-hover table-striped">
                                <thead>
                                    <th data-field="vl_lab_id" data-sortable="true">VL Lab</th>
                                    <th data-field="batch" >Batch</th>
                                    <th data-field="dr_lab_id" data-sortable="true">HIVDR Lab</th>
                                    <th data-field="created_at">Creation Date</th>
                                    <th data-field="referral_date">Referral Date</th>
                                    <th data-field="status">Batched Samples</th>
                                    <th data-field="pending">Pending Referral</th>
                                </thead>
                                <tbody>
                                    @foreach ($batches as $batch)
                                    <tr>
                                        <td>{{ $batch->vl_lab->name }}</td>
                                        <td>
                                            <a href="{{ route('batches.show', array($batch->id)) }}">
                                                {{ $batch->dr_lab->name }} / {{ date('d-M-Y', strtotime($batch->created_at)) }} / {{ $batch->referral_date != NULL ? date('d-M-Y', strtotime($batch->referral_date)) : 'OPEN' }}
                                            </a>
                                        </td>
                                        <td>{{ $batch->dr_lab->name }}</td>
                                        <td>{{ date('dS M Y', strtotime($batch->created_at)) }}</td>
                                        <td>{{ date('dS M Y', strtotime($batch->referral_date)) ?? 'OPEN' }}</td>
                                        <td>{{ $batch->eligible_samples->count() }}</td>
                                        <td>
                                            @if($batch->eligible_samples->where('accepted_at_dr', '<>', 1)->count() > 0)
                                                {{ $batch->eligible_samples->where('accepted_at_dr', '<>', 1)->count() }}
                                            @else
                                                <span class='text-success'>&#10003; </span> <span class='text-muted'> None<span>
                                            @endif
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
