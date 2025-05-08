<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibleSample;
use App\Models\DrugResistance;
use App\Models\TestResult;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->query('start_date') ?? '2021-01-01';
        $end_date   = $request->query('end_date') ?? Carbon::now()->toDateString();
        $group_by   = 'facility.district.region.name';

        $eligible_samples_count = EligibleSample::where('vl_source', 'LIMS')
                                    ->where('date_collected', '>=', $start_date)
                                    ->where('date_collected', '<=', $end_date)
                                    ->count();
        $plasma_samples_count   = EligibleSample::where('vl_source', 'LIMS')
                                    ->where('sample_type', 'plasma')
                                    ->where('date_collected', '>=', $start_date)
                                    ->where('date_collected', '<=', $end_date)
                                    ->count();
        $referred_samples_count = EligibleSample::where('vl_source', 'LIMS')
                                    ->where('accepted_at_dr', 1)
                                    ->where('date_collected', '>=', $start_date)
                                    ->where('date_collected', '<=', $end_date)
                                    ->count();
        $results_received_count = EligibleSample::where('vl_source', 'LIMS')->withWhereHas('test_result', function ($query) {
                                        $query->whereNotNull('dr_id');
                                    })
                                    ->where('date_collected', '>=', $start_date)
                                    ->where('date_collected', '<=', $end_date)
                                    ->count();
        $results_amplified_count = TestResult::distinct('vl_id')->where('is_amplified',1)
                                        ->withWhereHas('eligible_sample', function($query) use ($start_date, $end_date) { 
                                            $query->where('vl_source', 'LIMS')->where('date_collected', '>=', $start_date) 
                                                ->where('vl_source', 'LIMS')->where('date_collected', '<=', $end_date); 
                                        })->count();
        $cases_discussed_count = DrugResistance::distinct('vl_id')
                                    ->where('decision', '<>', 'pending')
                                    ->withWhereHas('viral_load', function ($query) use ($start_date, $end_date) {
                                        $query->withWhereHas('eligible_sample', function ($query2) use ($start_date, $end_date) {
                                            $query2->where('date_collected', '>=', $start_date)
                                                ->where('date_collected', '<=', $end_date);
                                        });
                                    })
                                    ->count();
        $cases_switched_count = DrugResistance::distinct('vl_id')
                                    ->where('decision', 'LIKE', 'Switched%')
                                    ->withWhereHas('viral_load', function ($query) use ($start_date, $end_date) {
                                        $query->withWhereHas('eligible_sample', function ($query2) use ($start_date, $end_date) {
                                            $query2->where('date_collected', '>=', $start_date)
                                                ->where('date_collected', '<=', $end_date);
                                        });
                                    })
                                    ->count();
        $cases_substituted_count = DrugResistance::distinct('vl_id')
                                    ->where('decision', 'LIKE', 'Substituted%')
                                    ->withWhereHas('viral_load', function ($query) use ($start_date, $end_date) {
                                        $query->withWhereHas('eligible_sample', function ($query2) use ($start_date, $end_date) {
                                            $query2->where('date_collected', '>=', $start_date)
                                                ->where('date_collected', '<=', $end_date);
                                        });
                                    })
                                    ->count();
        $cases_maintained_count = DrugResistance::distinct('vl_id')
                                    ->where('decision', 'LIKE', 'Maintained%')
                                    ->withWhereHas('viral_load', function ($query) use ($start_date, $end_date) {
                                        $query->withWhereHas('eligible_sample', function ($query2) use ($start_date, $end_date) {
                                            $query2->where('date_collected', '>=', $start_date)
                                                ->where('date_collected', '<=', $end_date);
                                        });
                                    })
                                    ->count();
        $started_art_count = DrugResistance::distinct('vl_id')
                                    ->whereNotNull('patient_regimen_id_after_regimen_start')
                                    ->withWhereHas('viral_load', function ($query) use ($start_date, $end_date) {
                                        $query->withWhereHas('eligible_sample', function ($query2) use ($start_date, $end_date) {
                                            $query2->where('date_collected', '>=', $start_date)
                                                ->where('date_collected', '<=', $end_date);
                                        });
                                    })
                                    ->count();
        $average_tat = DB::table('drug_resistances')
                        ->selectRaw('round(AVG(DATEDIFF(decision_date, (select date_collected from eligible_samples where DATE(date_collected) between "'.$start_date.'" and "'.$end_date.'" and eligible_samples.id = (select eligible_sample_id from viral_loads where viral_loads.id = drug_resistances.vl_id)))),0) as average_tat')
                        ->get()->first()->average_tat;

        $eligible_samples = EligibleSample::with(['facility.district.region', 'facility.implementing_partner'])->where('vl_source', 'LIMS')
                                    ->where('date_collected', '>=', $start_date)
                                    ->where('date_collected', '<=', $end_date)
                                    ->get();
                                    // ->groupBy('facility.district.region.name');
        // dd($eligible_samples->groupBy('facility.district.name'));
        // $summary = $this->getSampleProfileSummary($eligible_samples);
        $summary = [];
        foreach ($eligible_samples->groupBy($group_by) as $key => $res) {
            $summary[$key]['sample_count'] = $res->count();
            $summary[$key]['plasma_count'] = $res->where('sample_type', 'Plasma')->count();
            $summary[$key]['dbs_count'] = $res->where('sample_type', '<>', 'Plasma')->count();
            $summary[$key]['plasma_percentage'] = ($summary[$key]['plasma_count'] / $summary[$key]['sample_count']) * 100;
        }
        // dd($summary);

        return view('dash', compact(
            'eligible_samples',
            'eligible_samples_count',
            'plasma_samples_count',
            'referred_samples_count',
            'results_received_count',
            'results_amplified_count',
            'cases_discussed_count',
            'cases_switched_count',
            'cases_substituted_count',
            'cases_maintained_count',
            'started_art_count',
            'average_tat',
            'start_date',
            'end_date',
            'group_by',
            'summary'
        ));
    }

    public function getSampleProfileSummary(Request $request)
    {
        $group_by   = $request->all()['group_by'];
        $start_date = $request->all()['start_date'];
        $end_date   = $request->all()['end_date'];
        $eligible_samples = EligibleSample::with(['facility.district.region', 'facility.implementing_partner', 'patient'])->where('vl_source', 'LIMS')
                                    ->where('date_collected', '>=', $start_date)
                                    ->where('date_collected', '<=', $end_date)
                                    ->get();
        // $group_by = $_POST['groupBy'] ?? 'facility.district.region.name';
        // echo "hello<<<>>>??? ".$group_by."<br>";
        $summary  = [];
        foreach ($eligible_samples->groupBy($group_by) as $key => $res) {
            $summary[$key]['sample_count'] = $res->count();
            $summary[$key]['plasma_count'] = $res->where('sample_type', 'Plasma')->count();
            $summary[$key]['dbs_count'] = $res->where('sample_type', '<>', 'Plasma')->count();
            $summary[$key]['plasma_percentage'] = ($summary[$key]['plasma_count'] / $summary[$key]['sample_count']) * 100;
            echo "
            <tr>
                <td>".$key."</td>
                <td class='text-right'>".$summary[$key]['sample_count']."</td>
                <td class='text-right'>".$summary[$key]['plasma_count']."</td>
                <td class='text-right'>".$summary[$key]['dbs_count']."</td>
                <td class='text-right'>".number_format($summary[$key]['plasma_percentage'])."%</td>
            </tr>
            ";
        }

        // print_r($summary);
        // return $summary;
    }
}
