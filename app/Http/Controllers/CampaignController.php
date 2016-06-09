<?php

namespace Networks\Http\Controllers;

use DateTime;
use DB;
use Input;
use Networks\Network;
use Validator;
use MongoDate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;
use Auth;

use Networks\Branche;
use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Libraries\CampaignStyleHelper;
use Networks\Item;


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

    public function newCampaign()
    {
        $validate = Validator::make(Input::all(), [
            'name' => 'required',
        ]);
        if ($validate->passes()) {
            $network = Network::find(session('network_id'));
            $branches = Branche::where('network_id', $network->_id)->where('status', '<>', 'filed')->lists("name", "_id");
            $cam = [
                "content" => [
                    "images" => [
                        "small" => "placeholder600X602.png",
                        "large" => "placeholder600X602.png",
                        "survey" => "placeholder600X602.png",
                    ],
                    "like_url" => "https://www.facebook.com/ReaccionMX/",
                    "captcha" => "demo",
                    "video" => "superman.mp4"
                ],
                "survey" => [
                    "q1" => [
                        "question" => "¿Tienes coche propio?",
                        "answers" => [
                            "a0" => "Si",
                            "a1" => "No"
                        ]
                    ],
                    "q2" => [
                        "question" => "¿Cada cuando sales de viaje de negocios?",
                        "answers" => [
                            "a0" => "3-5 veces por mes",
                            "a1" => "1-2 veces por mes",
                            "a2" => "cada dos meses",
                            "a3" => "No salgo de viaje"
                        ]
                    ],
                    "q3" => [
                        "question" => "¿Cada cuando sales viaje por placer?",
                        "answers" => [
                            "a0" => "4-7 veces al año",
                            "a1" => "2-3 veces al año",
                            "a2" => "1 vez año",
                            "a3" => "No salgo de viaje"
                        ]
                    ],
                    "q4" => [
                        "question" => "Cuando sales de viaje por placer ¿Con quién viajas? ",
                        "answers" => [
                            "a0" => "Familia",
                            "a1" => "Amigos",
                            "a2" => "Pareja",
                            "a3" => "Solo"
                        ]
                    ],
                    "q5" => [
                        "question" => "¿Que paginas para reservar hoteles utilizas? ",
                        "answers" => [
                            "a0" => "hoteles.com",
                            "a1" => "trivago.com",
                            "a2" => "expedia.com",
                            "a3" => "otro"
                        ]
                    ]
                ]
            ];

            $cam = (object)$cam;

            $dashboard = compact('branches', 'cam');

            return view('campaign.new', $dashboard);
        } else {
            //redirect to campaigns list
            return redirect()->route("campaigns::index");
        }

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
            $count = 0;
            $chart5 = [];

            $json = "{}";
            if ($campaign->interaction['name'] == 'survey') {
                foreach ($campaign->content['survey'] as $q) {
                    $survey = $collection->aggregate([
                        [
                            '$match' => [
                                'campaign_id' => $campaign->_id,
                                'survey.q' . $count => ['$exists' => true]
                            ]
                        ],
                        [
                            '$group' => [
                                '_id' =>
                                    ['answer' => '$survey.q' . $count,
                                        'gender' => '$user.gender',
                                        'question' => ['$literal' => 'q' . ($count)]
                                    ],
                                'cnt' => ['$sum' => 1]
                            ]
                        ],
                        [
                            '$sort' => ['_id' => 1]
                        ]
                    ])['result'];
                    $count++;
                    array_push($chart5, $survey);
                }

                $json = json_decode($json);
                foreach ($campaign->content['survey'] as $key => $value) {
                    $json->$key = array('total' => 0, 'data' => $value, 'a0' => array('male' => 0, 'female' => 0));
                }
                foreach ($chart5 as $v) {
                    foreach ($v as $c) {
                        if ($c['_id']['gender'] == 'male') {
                            $json->{$c['_id']['question']}['total'] += $c['cnt'];
                            if (isset($json->{$c['_id']['question']}{$c['_id']['answer']})) {
                                $json->{$c['_id']['question']}{$c['_id']['answer']}['male'] += $c['cnt'];
                            } else {
                                $json->{$c['_id']['question']}{$c['_id']['answer']} = array('male' => $c['cnt'], 'female' => 0);
                            }
                        } else {
                            $json->{$c['_id']['question']}['total'] += $c['cnt'];
                            if (isset($json->{$c['_id']['question']}{$c['_id']['answer']})) {
                                $json->{$c['_id']['question']}{$c['_id']['answer']}['female'] += $c['cnt'];
                            } else {
                                $json->{$c['_id']['question']}{$c['_id']['answer']} = array('male' => 0, 'female' => $c['cnt']);
                            }
                        }
                    }
                }
                json_encode($json);
            }


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
                'json' => $json
            ]);
        } else {
            return redirect()->route('campaign::index')->with('data', 'errorCamp');
        }
    }


    /**
     * @param Request $request
     */
    public function saveImageItem(Request $request)
    {

        //echo "{success: 'true', img_length:".print_r($request)."}";


        if (Input::get("imgType") == "#image-small") {
            //saving small image
            $img = Input::get('imgToSave');
            $imageType = "small";
        } else if (Input::get("imgType") == "#image-large") {
            //saving large image
            $img = Input::get('imgToSave');
            $imageType = "large";

        } else if (Input::get("imgType") == "#image-survey") {

            $img = Input::get('imgToSave');
            $imageType = "survey";
        } else if (Input::get("imgType") == "#image-video") {

            $img = Input::get('imgToSave');
            $imageType = "video";
        }else {
            $res = array('success' => false, 'msg' => 'error with image type');
            echo $res;
        }

        //transforming string to image file
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $filename = time() . ".png";

        //transferring file to storage
        $file = storage_path() . '/app/' . $filename;
        $success = file_put_contents($file, $data);
        $pngToDelete = $filename;

        //compress png to jpg
        $png = $file;
        $filename = time() . ".jpg";
        $file = storage_path() . '/app/' . $filename;
        $image = imagecreatefrompng($png);
        imagejpeg($image, $file, 90);
        imagedestroy($image);


        if ($success) {
            //image copied to server successfully

            /*
            $fc = new FileCloud();

            //get uploaded file and copy it to cloud
            $uploadedFile = Storage::get($filename);
            $fileSaved = $fc->put(time() . ".jpg", $uploadedFile);*/

            //upload to S3
            $uploadedFile = Storage::get($filename);
            Storage::disk('s3')->put("items/" . $filename, $uploadedFile, "public");

            //delete server file
            Storage::delete($filename);
            Storage::delete($pngToDelete);

            //created item related to campaign
            $item = Item::create(
                [
                    "filename" => $filename,
                    "administrator_id" => Auth::user()->_id,
                    "type" => 'image',
                ]
            );

            $res = array('success' => true, 'filename' => $filename, 'item_id' => $item->_id, 'imageType' => $imageType);

            echo json_encode($res);

        } else {
            $res = array('success' => false, 'msg' => 'error saving cropped image on storage');
            echo json_encode($res);
        }


    }


    /**
     * @param Request $request
     */
    public function saveVideoItem(Request $request)
    {
        if (!$request->hasFile('video')) {
            $res = array('success' => false, 'msg' => 'no file selected');
            echo json_encode($res);
        }

        if (!$request->file('video')->isValid()) {
            $res = array('success' => false, 'msg' => 'file is not valid');
            echo json_encode($res);
        }

        $video = $request->file('video');

        $v = Validator::make(
            $request->all(),
            ['video' => 'required|max:10240']//10mb max
        );

        if ($v->fails()) {
            $res = array('success' => false, 'msg' => $v->errors());
            echo json_encode($res);
        }

        $filename = "v_" . time() . "_" . $video->getClientOriginalName();

        //transferring file to storage
        $path = storage_path() . '/app/';
        $success = $video->move($path, $filename);
        $videoToDelete = $filename;

        if ($success) {
            //image copied to server successfully

            //upload to S3
            $uploadedFile = Storage::get($filename);
            Storage::disk('s3')->put("items/" . $filename, $uploadedFile, "public");

            //delete server file
            Storage::delete($videoToDelete);

            //created item related to campaign
            $item = Item::create(
                [
                    "filename" => $filename,
                    "administrator_id" => Auth::user()->_id,
                    "type" => 'video',
                ]
            );

            $res = array('success' => true, 'filename' => $filename, 'item_id' => $item->_id);

            echo json_encode($res);

        } else {
            $res = array('success' => false, 'msg' => 'error saving cropped image on storage');
            echo json_encode($res);
        }


    }

}
