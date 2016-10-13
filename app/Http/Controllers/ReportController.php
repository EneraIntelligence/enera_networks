<?php

namespace Networks\Http\Controllers;

use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

use MongoDate;
use MongoId;
use Networks\Branch;
use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Libraries\MathHelper;
use Networks\ReportDashboard;
use Networks\SummaryCampaign;
use Networks\SummaryNetwork;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['Reportes'];

        return view('reports.index', [
            'navData' => $navData
        ]);
    }

    public function users()
    {
        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();
        $m2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(30)->first();


        $male = isset($summary_network->accumulated['users']['demographic']['male']) ? $summary_network->accumulated['users']['demographic']['male'] : [];
        $male_inc = $summary_network ? $summary_network->accumulled['user'] : 0;
        $female = isset($summary_network->accumulated['users']['demographic']['female']) ? $summary_network->accumulated['users']['demographic']['female'] : [];

        $male_interactions = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->take(7)->select('users.demographic.male', 'created_at')->get();
        $female_interactions = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->take(7)->select('users.demographic.female')->get();


        //TODO hacer más bonito la agrupación de edades
        $m = ["Hombres", 0, 0, 0, 0, 0];
        foreach ($male as $key => $ma) {
            if ($key >= 0 && $key <= 17) {
                $m[5] += $ma * -1;
            } else if ($key >= 18 && $key <= 34) {
                $m[4] += $ma * -1;
            } else if ($key >= 35 && $key <= 45) {
                $m[3] += $ma * -1;
            } else if ($key >= 46 && $key <= 60) {
                $m[2] += $ma * -1;
            } else {
                $m[1] += $ma * -1;
            }
        }

        $f = ["Mujeres", 0, 0, 0, 0, 0];
        foreach ($female as $key => $fe) {
            if ($key >= 0 && $key <= 17) {
                $f[5] += $fe;
            } else if ($key >= 18 && $key <= 34) {
                $f[4] += $fe;
            } else if ($key >= 35 && $key <= 45) {
                $f[3] += $fe;
            } else if ($key >= 46 && $key <= 60) {
                $f[2] += $fe;
            } else {
                $f[1] += $fe;
            }
        }
        $edad_tota_hombres = 0;
        $conteo_hombres = 0;

        if ($summary_network) {
            foreach ($summary_network->accumulated['users']['demographic']['male'] as $key => $value) {
                $edad_tota_hombres += $key * $value;
                $conteo_hombres += $value;
            }
        }

        $edad_tota_mujeres = 0;
        $conteo_mujeres = 0;
        if ($summary_network) {
            foreach ($summary_network->accumulated['users']['demographic']['female'] as $key => $value) {
                $edad_tota_mujeres += $key * $value;
                $conteo_mujeres += $value;
            }
        }

        $date_interactions = ['x'];
        $date_males_interactions = ['male'];
        $date_females_interactions = ['female'];


        if ($date_males_interactions != []) {
            foreach ($male_interactions as $male) {
                array_push($date_interactions, $male->created_at->format('Y-m-d'));
                array_push($date_males_interactions, array_sum($male->users['demographic']['male']));
            }
        }

        if ($date_females_interactions != []) {
            foreach ($female_interactions as $female) {
                array_push($date_females_interactions, array_sum($female->users['demographic']['female']));
            }
        }


        $total_male = $summary_network ? array_sum($summary_network->accumulated['users']['demographic']['male']) : 0;
        $total_female = $summary_network ? array_sum($summary_network->accumulated['users']['demographic']['female']) : 0;

        $last_month_male = $m2 ? array_sum($m2->accumulated['users']['demographic']['male']) : 0;
        $last_month_female = $m2 ? array_sum($m2->accumulated['users']['demographic']['female']) : 0;

        $increments_women = $this->increment($total_female, $last_month_female);
        $increments_men = $this->increment($total_male, $last_month_male);


        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Usuarios'];


        return view('reports.users', [
            'navData' => $navData,
            'male' => $m,
            'female' => $f,
            'total' => $summary_network ? $summary_network->accumulated['users']['total'] : 0,
            'total_male' => $total_male,
            'increments_men' => $increments_men,
            'total_female' => $total_female,
            'increments_women' => $increments_women,
            'promedio_hombres' => $summary_network ? $edad_tota_hombres / $conteo_hombres : 0,
            'promedio_mujeres' => $summary_network ? $edad_tota_mujeres / $conteo_mujeres : 0,
            'date_interactions' => $date_interactions,
            'date_males_interactions' => $date_males_interactions,
            'date_females_interactions' => $date_females_interactions

        ]);
    }

    public function devices()
    {

        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();

        $devices_per_day = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->take(7)->select('devices.os', 'created_at')->get();
        $date_for_devices = ['x'];
        $group_of_devices = ['data1'];

        if ($devices_per_day) {
            foreach ($devices_per_day as $device) {
                array_push($date_for_devices, $device->created_at->format('Y-m-d'));
                array_push($group_of_devices, array_sum($device->devices['os']));
            }
        }


        $unique_clients = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->lists('client_id');
        $client = array_unique(json_decode(json_encode($unique_clients), true));

        if ($unique_clients) {
            $campaigns = Campaign::whereIn('client_id', $client)->lists('_id');
            $top_access = SummaryCampaign::whereIn('campaign_id', $campaigns)->orderBy('accumulated.completed', 'acs')->get();
        } else {
            $top_access = [];
        }


        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Dispositivos'];

        return view('reports.devices', [
            'navData' => $navData,
            'total' => $summary_network ? $summary_network->accumulated['devices']['total'] : 0,
            'visits' => $summary_network ? $summary_network->accumulated['users']['total'] : 0,
            'date_for_devices' => $date_for_devices,
            'group_of_devices' => $group_of_devices,
            'top_access' => $top_access
        ]);
    }

    public function campaigns()
    {


        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();
        $m2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(30)->first();
        $last = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'asc')->first();
        $branches_network = Branch::where('network_id', session('network_id'))->lists('_id');
        $campaigns_network = Campaign::whereIn('branches', $branches_network)->lists('_id');
        $summary_campaign = SummaryCampaign::whereIn('campaign_id', $campaigns_network)->get();
        $name_of_campaigns = ['x'];
        $loaded = ['loaded'];
        $completed = ['completed'];

        if ($summary_campaign) {
            foreach ($summary_campaign as $sum_campaign) {
                array_push($name_of_campaigns, $sum_campaign->campaign->name);
                array_push($loaded, $sum_campaign->accumulated['loaded']);
                array_push($completed, $sum_campaign->accumulated['completed']);
            }
        }

        $inc_total_access = 0;
        $inc_new_access = 0;
        $inc_completed_interactions = 0;
        if ($summary_network) {
            $inc_total_access = $this->increment($summary_network->accumulated['connections'], $m2->accumulated['connections']);
            $inc_new_access = $this->increment(($summary_network->accumulated['connections'] - $m2->accumulated['connections']), ($m2->accumulated['connections'] - $last->accumulated['connections']));
            $inc_completed_interactions = $this->increment($summary_network->devices['interactions']['completed'], $m2->devices['interactions']['completed']);
        }


        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Campañas'];

        return view('reports.campaigns', [
            'navData' => $navData,
            'name_of_campaigns' => $name_of_campaigns,
            'loaded' => $loaded,
            'completed' => $completed,
            'access' => $summary_network ? $summary_network->accumulated['users']['total'] : 0,
            'new_access' => $summary_network ? $summary_network->accumulated['connections'] - $m2->accumulated['connections'] : 0,
            'completed_interactions' => $summary_network ? $summary_network->devices['interactions']['completed'] : 0,
            'inc_total_access' => $inc_total_access,
            'inc_new_access' => $inc_new_access,
            'inc_completed_interactions' => $inc_completed_interactions
        ]);
    }


    public function branches()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Nodos'];

        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();
        $m2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(30)->first();

        $user_increase = $summary_network ? $this->increment($summary_network->accumulated['users']['total'], $m2->accumulated['connections']['total']) : 0;

        $edad_promedio = 0;


        if ($summary_network) {
            foreach ($summary_network->accumulated['users']['demographic']['male'] as $key => $value) {
                $edad_promedio += $key * $value;
            }
        }

        if ($summary_network) {
            foreach ($summary_network->accumulated['users']['demographic']['female'] as $key => $value) {
                $edad_promedio += $key * $value;
            }
        }


        $network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->take(5)->get();
        $unique_devices = ['data1'];
        $dates_devices = ['x'];
        if ($network) {
            foreach ($network as $net) {
                array_push($dates_devices, $net->created_at->format('Y-m-d'));
                array_push($unique_devices, $net->devices['total']);
            }
        }

        $genero = '';
        if ($summary_network) {
            $genero = array_sum($summary_network->accumulated['users']['demographic']['female']) > array_sum($summary_network->accumulated['users']['demographic']['male']) ? 'Mujeres' : 'Hombres';
        }

        $loyalty_inc = 0;
        $loyalty = ReportDashboard::today(session('network_id'));
        $first_register = ReportDashboard::weekBefore(session('network_id'));
        if($loyalty && $first_register)
            $loyalty_inc = MathHelper::calculateIncrement($loyalty->recurrent,$first_register->recurrent);

        $branches = Branch::where('network_id', session('network_id'))->lists('_id');
        $collection = DB::getMongoDB()->selectCollection('campaign_logs');
        $for_weekday = $collection->aggregate([
            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $branches->all()
                    ],
                    'interaction.accessed' => [ '$exists' => true]

                ]
            ],
            [
                '$project' => [
                    'day'=> [ '$dayOfWeek'=> ['$subtract'=> [ '$created_at', 6 * 60 * 60 * 1000 ] ] ],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$day',
                    'count' => ['$sum' => 1]
                ]
            ],
            [ '$sort' => [  '_id'=> 1 ] ]
        ]);


        $chart_weekday = ['data1', 0,0,0,0,0,0,0];
        foreach ($for_weekday['result'] as  $weekday){
            $chart_weekday[$weekday['_id']] = $weekday['count'];
        }
        $recurrent_day = array_search(max($chart_weekday), $chart_weekday);
        
        return view('reports.branches', [
            'navData' => $navData,
            'unique_devices' => $unique_devices,
            'dates_devices' => $dates_devices,
            'access' => $summary_network ? $summary_network->accumulated['connections'] : 0,
            'users' => $summary_network ? $summary_network->accumulated['users']['total'] : 0,
            'devices' => $summary_network ? $summary_network->accumulated['devices']['total'] : 0,
            'user_increase' => $user_increase,
            'edad_promedio' => $summary_network ? $edad_promedio / $summary_network->accumulated['users']['total'] : 0,
            'genero' => $genero,
            'loyalty' => $loyalty ? $loyalty->recurrent : 0,
            'loyalty_inc' => $loyalty_inc ? $loyalty_inc : 0,
            'recurrent_day' => $recurrent_day? $recurrent_day : -1
        ]);
    }

    public function access()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Accesos'];

        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();
        $date = $summary_network ? date('Y-m-d', strtotime($summary_network->date)) : '1970-12-12';
        $m2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(30)->first();

        if ($summary_network && $m2) {
            $access_increase = $this->increment($summary_network->accumulated['connections'], $m2->accumulated['connections']);
        } else {
            $access_increase = 0;
        }

        $branches = Branch::where('network_id', session('network_id'))->lists('_id');


        $recurentes = [0, 0, 0, 0];

        $collection = DB::getMongoDB()->selectCollection('campaign_logs');

        //recurrencia en conexiones
        $recurrencia = $collection->aggregate([

            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $branches->all()
                    ],
                    'interaction.accessed' => [ '$exists' => true]

                ]
            ],
            [
                '$group' => [
                    '_id' => '$device.mac',
                    'count' => ['$sum' => 1]
                ]
            ]
        ]);

        //acumulado de conexiones por día de la semana
        $for_weekday = $collection->aggregate([
            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $branches->all()
                    ],
                    'interaction.accessed' => [ '$exists' => true]

                ]
            ],
            [
                '$project' => [
                    'day'=> [ '$dayOfWeek'=> ['$subtract'=> [ '$created_at', 6 * 60 * 60 * 1000 ] ] ],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$day',
                    'count' => ['$sum' => 1]
                ]
            ],
            [ '$sort' => [  '_id'=> 1 ] ]
        ]);


        $chart_weekday = ['data1', 0,0,0,0,0,0,0];
        foreach ($for_weekday['result'] as  $weekday){
            $chart_weekday[$weekday['_id']] = $weekday['count'];
        }


        $for_hour = $collection->aggregate([
            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $branches->all()
                    ],
                    'interaction.accessed' => [ '$exists' => true]

                ]
            ],
            [
                '$project' => [
                    'hour'=> [ '$hour'=> ['$subtract'=> [ '$created_at', 6 * 60 * 60 * 1000 ] ]  ],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$hour',
                    'count' => ['$sum' => 1]
                ]
            ],
            [ '$sort' => [  '_id'=> 1 ] ]
        ]);

        $chart_hour = ['data1',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($for_hour['result'] as $hour){
            $chart_hour[$hour['_id'] + 1] = $hour['count'];
        }


        $num_reconnection = 0;
        foreach ($recurrencia['result'] as $result) {
            if ($result['count'] == 1) {
                $recurentes[0] += 1;
            } elseif ($result['count'] > 1 && $result['count'] <= 4) {
                $recurentes[1] += 1;
            } elseif ($result['count'] > 4 && $result['count'] <= 8) {
                $recurentes[2] += 1;
            } elseif ($result['count'] > 8) {
                $recurentes[3] += 1;
            }
            if ($result['count'] > 1){
                $num_reconnection += $result['count'];
            }
        }

        $for_os = $collection->aggregate([
            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $branches->all()
                    ],
                    'interaction.accessed' => [ '$exists' => true]

                ]
            ],
            [
                '$group' => [
                    '_id' => '$device.os',
                    'count' => ['$sum' => 1]
                ]
            ],
            [ '$sort' => [  'count'=> -1 ] ]
        ]);


        $access_per_month = $collection->aggregate([
            [
                '$match' => [
                    'device.branch_id' => [
                        '$in' => $branches->all()
                    ],
                    'interaction.accessed' => [ '$exists' => true]

                ]
            ],
            [
                '$project' => [
                    'day'=> [ '$dayOfMonth'=> ['$subtract'=> [ '$created_at', 6 * 60 * 60 * 1000 ] ]   ],
                ]
            ],
            [
                '$group' => [
                    '_id' => '$day',
                    'count' => ['$sum' => 1]
                ]
            ],
            [ '$limit' => 30]
        ]);
        


        $recurrent = ReportDashboard::where('network_id', new MongoId(session('network_id')))->orderBy('report_date', 'desc')->first();
        $first = ReportDashboard::where('network_id', new MongoId(session('network_id')))->orderBy('report_date', 'asc')->first();

        $inc_recurrent = 0;
        if ($recurrent){
            $inc_recurrent = $this->increment($recurrent->recurrent, $first->recurrent);
        }

        $campaigns = Campaign::whereIn('branches', $branches->all())->count();

        
        return view('reports.access', [
            'navData' => $navData,
            'access' => $summary_network ? $summary_network->accumulated['connections'] : 0,
            'access_increase' => $access_increase,
            'recurrentes' => $recurentes,
            'chart_weekday' => $chart_weekday,
            'chart_hour' => $chart_hour,
            'total_recurrent' => $recurrent ? $recurrent->recurrent : 0,
            'inc_recurrent' => $inc_recurrent,
            'users_with_reconnection' => $recurrent ? array_sum($recurentes) - $recurentes[0] : 0,
            'poc_reconnection' => $recurrent ? ((array_sum($recurentes) - $recurentes[0]) * 100) / array_sum($recurentes) : 0,
            'num_reconnection' => $num_reconnection,
            'connection' => $recurrencia ? array_sum($recurrencia['result']) : 0,
            'average_reconnection' => $recurrent ? $num_reconnection / (array_sum($recurentes) - $recurentes[0]) : 0,
            'campaigns' => $campaigns,
            'for_os' => $for_os
        ]);
    }


    public function settings()
    {
        return view('profile.settings');
    }


    private function increment($actual, $last)
    {
        $diff = $actual - $last;
        $increment = $diff > 0 && $last > 0 ? $diff / $last : 0;
        $result = $increment * 100;
        return $result;
    }

}
