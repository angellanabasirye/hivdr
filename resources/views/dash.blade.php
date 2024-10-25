@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Dashboard')
@section("content")
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 180px">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category">Eligible Samples Profile</p>
                                    <h5 class="card-title" style="padding-top: 5px">5924 Eligible Samples</h5>
                                    <h6 class="card-title" style="padding-top: 5px">61% Plasma</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> <span><b>Plasma:</b> 3,619 </span> <span class="float-right"><b>DBS:</b> 2,305</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 180px">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>                                       
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category">Drug Resistance Testing</p>
                                    <h5 class="card-title" style="padding-top: 5px">3,198 Referred for DRT</h5>
                                    <h6 class="card-title" style="padding-top: 5px">2,577 (81%) Results received</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i><b>Amplified:</b> 1,985 (77%) 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 180px">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-light-3 text-success"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category">Case Discussion</p>
                                    <h5 class="card-title" style="padding-top: 5px">1,705 (86%) Discussed</h5>
                                    <h6 class="card-title" style="padding-top: 5px">857 (50%) Switched</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i><b>Started on ART:</b> 526 (61%)<span class="float-right"><b>Substituted:</b> 87 (10%)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 180px">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-watch-time text-primary"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category">TAT (Sample Collection to Discussion)</p>
                                     <h5 class="card-title" style="padding-top: 5px">196 Days</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i><span> <b>Committee TAT:</b></span >  <span class="float-right"><b>Clinician TAT:</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px; margin-bottom:10px; padding-top: 10px; padding-bottom: 10px;">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Cascade Summary: from date - to date cohort</h4>
                    </div>
                    <div class="card-body ">
                        <div id="chartActivity" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats text-right">
                            <i class="fa fa-check"></i> Source: HIVDR Database
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

@endsection