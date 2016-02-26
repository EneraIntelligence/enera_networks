<?php

namespace Networks\Http\Controllers;

use DateTime;
use DB;
use MongoDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Networks\Branche;
use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Libraries\CampaignStyleHelper;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('campaign.index', [
            'campaigns' => auth()->user()->campaigns,
        ]);
    }

    public function show($id)
    {
        $porcentaje = 0.0;
        $campaign = Campaign::find($id); //busca la campaña
        if ($campaign) {
            /******     saca el color y el icono que se va a usar regresa un array  ********/
            $color = [];
            $color['icon'] = CampaignStyleHelper::getStatusIcon($campaign->status);
            $color['color'] = CampaignStyleHelper::getStatusColor($campaign->status);

            /****         OBTENER PORCENTAJE DEL TIEMPO TRANSCURRIDO       ***************/
            $start = new DateTime(date('Y-m-d H:i:s', $campaign->filters['date']['start']->sec));
            $end = new DateTime(date('Y-m-d H:i:s', $campaign->filters['date']['end']->sec));

            switch ($campaign->status) {
                case 'pending':
                    $porcentaje = 0.0;
                    break;
                case 'rejected':
                    $porcentaje = 0.0;
                    break;
                case 'ended':
                    $ended = new DateTime($campaign->history->where('status', 'ended')->first()->date);
                    $total = $start->diff($end);
                    $diff = $start->diff($ended);
                    $porcentaje = $diff->format('%a') / $total->format('%a');
                    break;
                case 'active':
                    $today = new DateTime();
                    if ($today < $start) {
                        $porcentaje = 0;
                    } else {
                        $today = new DateTime();
                        $total = $start->diff($end);
                        $diff = $start->diff($today);
                        $porcentaje = $diff->format('%a') / $total->format('%a');
                    }
                    break;
                case 'canceled':
                    $canceled = new DateTime($campaign->history->where('status', 'canceled')->first()->date);
                    $total = $start->diff($end);
                    $diff = $start->diff($canceled);
                    $porcentaje = $diff->format('%a') / $total->format('%a');
                    break;
            }

            /*******         OBTENER LAS EDADES Y CANTIDAD DE USUARIOS UNICOS       ***************/
            $collection = DB::getMongoDB()->selectCollection('campaign_logs');
            $gender_age = $collection->aggregate([

                // Stage 1
                [
                    '$match' => [
                        'campaign_id' => $id,
                        'user.id' => ['$exists' => true],
                    ]
                ],
                // Stage 2
                [
                    '$group' => [
                        '_id' => [
                            'gender' => '$user.gender',
                            'age' => '$user.age'
                        ],
                        'users' => [
                            '$addToSet' => '$user.id'
                        ]
                    ]
                ],
                // Stage 3
                [
                    '$unwind' => '$users'
                ],
                // Stage 4
                [
                    '$group' => [
                        '_id' => '$_id',
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ],
                // Stage 5
                [
                    '$sort' => [
                        '_id' => 1
                    ]
                ]
            ]);

            $male = array_fill(1, 10, 0);
            $female = array_fill(1, 10, 0);

            foreach ($gender_age['result'] as $person) {
                if ($person['_id']['age'] > 0 && $person['_id']['age'] <= 17) {
                    ${$person['_id']['gender']}[1] += $person['count'];
                } else if ($person['_id']['age'] >= 18 && $person['_id']['age'] <= 20) {
                    ${$person['_id']['gender']}[2] += $person['count'];
                } else if ($person['_id']['age'] >= 21 && $person['_id']['age'] <= 30) {
                    ${$person['_id']['gender']}[3] += $person['count'];
                } else if ($person['_id']['age'] >= 31 && $person['_id']['age'] <= 40) {
                    ${$person['_id']['gender']}[4] += $person['count'];
                } else if ($person['_id']['age'] >= 41 && $person['_id']['age'] <= 50) {
                    ${$person['_id']['gender']}[5] += $person['count'];
                } else if ($person['_id']['age'] >= 51 && $person['_id']['age'] <= 60) {
                    ${$person['_id']['gender']}[6] += $person['count'];
                } else if ($person['_id']['age'] >= 61 && $person['_id']['age'] <= 70) {
                    ${$person['_id']['gender']}[7] += $person['count'];
                } else if ($person['_id']['age'] >= 71 && $person['_id']['age'] <= 80) {
                    ${$person['_id']['gender']}[8] += $person['count'];
                } else if ($person['_id']['age'] >= 81 && $person['_id']['age'] <= 90) {
                    ${$person['_id']['gender']}[9] += $person['count'];
                } else if ($person['_id']['age'] >= 91) {
                    ${$person['_id']['gender']}[10] += $person['count'];
                }
            }

            $male = array_map(function ($item) {
                return $item * -1;
            }, $male);

            /*******         OBTENER LAS INTERACCIONES POR hora       ***************/
            $IntLoaded = $collection->aggregate([
                [
                    '$match' => [
                        'campaign_id' => $id,
                        'interaction.loaded' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays(30)->format('Y-m-d'))),
                            '$lte' => new MongoDate(strtotime(Carbon::today()->subDays(0)->format('Y-m-d'))),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%H', 'date' => ['$subtract' => ['$created_at', 18000000]]
                            ]
                        ],
                        'cnt' => [
                            '$sum' => 1
                        ]
                    ],
                ],
                [
                    '$sort' => [
                        '_id' => 1
                    ]
                ]
            ]);
            $IntCompleted = $collection->aggregate([
                [
                    '$match' => [
                        'campaign_id' => $id,
                        'interaction.completed' => [
                            '$gte' => new MongoDate(strtotime(Carbon::today()->subDays(30)->format('Y-m-d'))),
                            '$lte' => new MongoDate(strtotime(Carbon::today()->subDays(0)->format('Y-m-d'))),
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            '$dateToString' => [
                                'format' => '%H', 'date' => ['$subtract' => ['$created_at', 18000000]]
                            ]
                        ],
                        'cnt' => [
                            '$sum' => 1
                        ]
                    ],
                ],
                [
                    '$sort' => [
                        '_id' => 1
                    ]
                ]
            ]);

            $IntHours = [];
            foreach ($IntLoaded['result'] as $k => $v) {
                $IntHours[$v['_id']]['loaded'] = $v['cnt'];
            }

            foreach ($IntCompleted['result'] as $k => $v) {
                $IntHours[$v['_id']]['completed'] = $v['cnt'];
            }

            /****         USUARIOS UNICOS       ***************/
            $unique_users_query = $collection->aggregate([
                [
                    '$match' => [
                        'campaign_id' => $id,
                    ]
                ],
                [
                    '$group' => [
                        '_id' => '',
                        'users' => [
                            '$addToSet' => '$user.id',
                        ]
                    ],
                ],
                ['$unwind' => '$users'],
                [
                    '$group' => [
                        '_id' => '$_id',
                        'cnt' => ['$sum' => 1]
                    ]
                ]
            ])['result'];
            $unique_users = isset($unique_users_query[0]['cnt']) ? $unique_users_query[0]['cnt'] : 0;

            /****         SI EL BRANCH TIENE ALL SE MOSTRARA COMO GLOBAL       ***************/
            $lugares = in_array('all', $campaign->branches) ? 'global' : $campaign->branches;

            return view('campaign.show', [
                'cam' => $campaign,
                'lugares' => $lugares,
                'men' => $male,
                'women' => $female,
                'porcentaje' => $porcentaje,
                'IntHours' => $IntHours,
                'unique_users' => $unique_users,
            ]);
        } else {
            return redirect()->route('campaign::index')->with('data', 'errorCamp');
        }
    }

}
