@extends('layouts.light_bootstrap')
@section('pagetitle', 'HIV DR Dashboard')
@section("content")
    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 195px; margin-bottom: 2px;">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category" style="font-size: medium; color: teal;">Eligible Samples Profile</p>
                                    <!-- <hr style="margin-top: 3px; margin-bottom: 1px;"> -->
                                    <h5 class="card-title" style="padding-top: 7px; padding-bottom: 7px;">
                                        {{ number_format(($plasma_samples_count/$eligible_samples_count)*100) }}% Plasma
                                    </h5>
                                    <span>
                                        {{ number_format($eligible_samples_count) }} Eligible samples
                                    </span>
                                    <br />
                                    <span>
                                        {{ number_format($plasma_samples_count) }} Plasma samples
                                    </span>
                                    <br />
                                    <span>
                                        {{ number_format($eligible_samples_count - $plasma_samples_count) }} DBS samples
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" id="more_first"><i class="fa fa-unlock-alt"></i> More..</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 195px; margin-bottom: 2px;">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>                                       
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category" style="font-size: medium; color: teal;">Drug Resistance Testing</p>
                                    <h5 class="card-title" style="padding-top: 7px; padding-bottom: 7px;">
                                        {{ number_format($referred_samples_count/$eligible_samples_count,2)*100 }}% Referred for DRT
                                    </h5>
                                    <span>{{ number_format($referred_samples_count) }} Referred for DRT</span>
                                    <br />
                                    <span>
                                         {{ number_format($results_received_count) }} reports received
                                         ({{ number_format($results_received_count/$referred_samples_count, 2)*100 }}%)
                                    </span>
                                    <br />
                                    <span>
                                        {{ $results_amplified_count}} with a valid result
                                        ({{ number_format($results_amplified_count/$results_received_count, 2)*100 }}%)
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" id="more_second"><i class="fa fa-unlock-alt"></i> More..</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 195px; margin-bottom: 2px;">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-light-3 text-success"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category" style="font-size: medium; color: teal;">Case Discussion</p>
                                    <h5 class="card-title" style="padding-top: 7px; padding-bottom: 7px;">
                                        {{ number_format($cases_discussed_count/$results_amplified_count,2)*100 }}% Cases reviewed
                                    </h5>
                                    <span>{{ number_format($cases_discussed_count) }} Discussed</span>
                                    <br />
                                    <span>
                                        {{ number_format($cases_switched_count) }} Switched
                                        ({{ number_format($cases_switched_count/$cases_discussed_count,2)*100 }}%)
                                    </span>
                                    <br />
                                    <span>
                                        {{ number_format($cases_substituted_count) }} Substituted
                                        ({{ number_format($cases_substituted_count/$cases_discussed_count,2)*100 }}%)
                                    </span>
                                    <br />
                                    <span>
                                        {{ number_format($started_art_count) }} started on ART 
                                        ({{number_format($started_art_count/($cases_switched_count + $cases_substituted_count),2)*100 }})%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" id="more_third"><i class="fa fa-unlock-alt"></i> More..</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card card-stats" style="height: 195px; margin-bottom: 2px;">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-2">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-watch-time text-primary"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="card-category" style="font-size: medium; color: teal;">TAT (Collection to Discussion)</p>
                                    <h5 class="card-title" style="padding-top: 7px; padding-bottom: 7px;">
                                        {{ $average_tat }} Days
                                     </h5>
                                     <span>::days</span>
                                     <br/>
                                     <span>::days</span>
                                     <br/>
                                     <span>::days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="#" id="more_fourth"><i class="fa fa-unlock-alt"></i> More..</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <small style="padding-left: 7px;">*Cohorts are according to sample collection date</small>
        <div class="row" style="margin-top:5px; margin-bottom:5px; padding-top: 5px; padding-bottom: 5px;">
        </div>
        <div class="row" id="cascade_summary">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title text-center" style="font-family: monospace; font-size: larger;">
                            Cascade Summary: from {{ date_create($start_date)->format("jS M Y") }} - {{ date_create($end_date)->format("jS M Y") }} cohort
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="chartActivity" class="ct-chart"></div>
                    </div>
                    <div class="card-footer" style="margin-top: -50px;">
                        <!-- <hr> -->
                        <div class="stats text-right">
                            <i class="fa fa-check"></i> Source: HIVDR Database, {{ date_create($start_date)->format("jS M Y") }} - {{ date_create($end_date)->format("jS M Y") }} cohort
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <div class="row" id="graph_sample_profile" style="display:none;">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <p>
                        <table>
                            <tr>
                                <td style="padding-right: 5px;"><b>Group By:</b></td>
                                <td id="region_filter" style="cursor: pointer; background-color:skyblue; padding:5px; border-right: 1px solid; width: 80px; text-align: center;">
                                    Region
                                </td>
                                <td id="district_filter" style="cursor: pointer; background-color:lightgray; padding:5px; border-right: 1px solid; width: 80px; text-align: center;">
                                    District
                                </td>
                                <td id="ip_filter" style="cursor: pointer; background-color:lightgray; padding:5px; border-right: 1px solid; width: 80px; text-align: center;">
                                    IP
                                </td>
                                <td id="sex_filter" style="cursor: pointer; background-color:lightgray; padding:5px; border-right: 1px solid; width: 80px; text-align: center;">
                                    Sex
                                </td>
                                <td><a href="#" class="btn-sm btn-secondary">Age</a></td>
                            </tr>
                        </table>
                    </p>
                    <table class="table table-sm table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <td>Group</td>
                                <td>Eligible Samples</td>
                                <td>Plasma</td>
                                <td>DBS</td>
                                <td>% Plasma</td>
                            </tr>
                        </thead>
                        <tbody id="sample_profile_summary">
                            @foreach ($summary as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td class="text-right">{{ $value['sample_count'] }}</td>
                                    <td class="text-right">{{ $value['plasma_count']}}</td>
                                    <td class="text-right">{{ $value['dbs_count'] }}</td>
                                    <td class="text-right">{{ number_format($value['plasma_percentage']) }} %</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Totals</td>
                                <td class="text-right">{{ number_format($eligible_samples_count) }}</td>
                                <td class="text-right">{{ number_format($plasma_samples_count) }}</td>
                                <td class="text-right">{{ number_format($eligible_samples_count - $plasma_samples_count) }}</td>
                                <td class="text-right">{{ number_format(($plasma_samples_count/$eligible_samples_count)*100) }}%</td>
                            </tr>
                        </tfoot>
                    </table>              
                </div>
            </div>
        </div>
        <div class="col-7"></div>
    </div>
    <div class="row" id="graph_drt" style="display:none;"></div>
    <div class="row" id="graph_case_discussion" style="display:none;"></div>
    <div class="row" id="graph_tat" style="display:none;"></div>

    <script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var count_eligible_samples = {!! json_encode($eligible_samples_count) !!}
        var count_referred_samples = {!! json_encode($referred_samples_count) !!}
        var count_received_results = {!! json_encode($results_received_count) !!}
        var count_amplified_results = {!! json_encode($results_amplified_count) !!}
        var count_cases_discussed = {!! json_encode($cases_discussed_count) !!}
        var count_cases_maintained = {!! json_encode($cases_maintained_count) !!}
        var count_cases_switched = {!! json_encode($cases_switched_count) !!}
        var count_cases_substituted = {!! json_encode($cases_substituted_count) !!}
        var count_started_art = {!! json_encode($started_art_count) !!}

        $('[id^=more').on('click', function() {
            var target  = null;
            var clicked = this.id;
            if (clicked == "more_first") {
                target = $('#graph_sample_profile');
            } else if (clicked == "more_second") {
                target = $('#graph_drt');
            } else if (clicked == "more_third") {
                target = $('#graph_case_discussion');
            } else if (clicked == "more_fourth") {
                target = $('#graph_tat');
            }

            if (target.is(':visible')) {
                $('#cascade_summary').show();
                target.hide();
                $(this).html('<i class="fa fa-unlock-alt"></i> More..');
            } else {
                $('#cascade_summary').hide();
                target.show();
                $(this).html('<i class="fa fa-lock"></i> Close');
            }
        });

        $('[id$=_filter]').on('click', function() {
            $('[id$=_filter]').css('background-color', 'lightgray');
            var idClicked = this.id;
            $(this).css('background-color', 'skyblue');
            if (idClicked == "region_filter") {
                var group_by = "facility.district.region.name";                
            } else if (idClicked == "district_filter") {
                var group_by = "facility.district.name";                
            } else if (idClicked == "ip_filter") {
                var group_by = "facility.implementing_partner.name";                
            } else if (idClicked == "sex_filter") {
                var group_by = "patient.gender";                
            }
            var start_date = {!! json_encode($start_date) !!};
            var end_date   = {!! json_encode($end_date) !!};
            $('#sample_profile_summary').load('/get_sample_profile_summary', {start_date, end_date, group_by});
        });
    </script>

@endsection