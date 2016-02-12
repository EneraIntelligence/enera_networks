<?php

namespace Networks\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use Networks\Branche;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Network;
use Session;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param $network
     */
    public function index()
    {
        return view('branches.index', [
            'branches' => Network::find(session('network_id'))->branches,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $branch = Branche::find($id);
        if ($branch && $branch->network_id == session('network_id')) {
            $devices = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        'device.mac' => ['$exists' => true],
                        'device.branch_id' => $branch->_id
                    ]
                ],
                [
                    '$group' => [
                        '_id' => '',
                        'mac' => [
                            '$addToSet' => '$device.mac'
                        ]
                    ]
                ],
                ['$unwind' => '$mac'],
                [
                    '$group' => [
                        '_id' => '$_id',
                        'count' => ['$sum' => 1]
                    ]
                ],
            ]);
            $users = DB::getMongoDB()->selectCollection('campaign_logs')->aggregate([
                [
                    '$match' => [
                        'user.id' => ['$exists' => true],
                        'device.branch_id' => $branch->_id
                    ]
                ],
                [
                    '$group' => [
                        '_id' => '',
                        'fb_id' => [
                            '$addToSet' => '$user.id'
                        ]
                    ]
                ],
                ['$unwind' => '$fb_id'],
                [
                    '$group' => [
                        '_id' => '$_id',
                        'count' => ['$sum' => 1]
                    ]
                ],
            ]);

            return view('branches.show', [
                'branch' => $branch,
                'network' => Network::find(session('network_id')),
                'devices' => $devices['result'][0]['count'],
                'users' => $users['result'][0]['count'],
            ]);
        } else {
            return redirect()->route('branches::index')->with([
                'n_type' => 'danger',
                'n_timeout' => 5000,
                'n_msg' => 'Nodo no encontrado.'
            ]);
        }
    }

}
