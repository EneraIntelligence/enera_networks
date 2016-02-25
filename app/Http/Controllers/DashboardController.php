<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use DB;
use Networks\Network;
use Networks\Branche;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branche::where('network_id', session('network_id'))->get();
        $branches_ids = [];
        foreach ($branches as $branch) {
            $branches_ids[] = $branch->_id;
        }

        $branches = Network::find(session('network_id'))->branches;

        $devices = $this->getUniqueDevices($branches_ids);
        $joined = $this->getUniqueJoined($branches_ids);
        $completed = $this->getAccessed($branches_ids);

        return view('dashboard.index', [
            'user' => Auth::user(),
            'devices' => $devices,
            'joined' => $joined,
            'completed' => $completed,
            'branches' => $branches
        ]);
    }

    private function getUniqueDevices($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id' => '',
                    'devices' => [
                        '$addToSet' => '$device.mac',
                    ]
                ]
            ],
            ['$unwind' => '$devices'],
            [
                '$group' => [
                    '_id' => '$_id',
                    'count' => ['$sum' => 1]
                ]
            ],
        ]);

        return $devices['result'][0]['count'];

    }


    private function getUniqueJoined($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'interaction.joined' => ['$exists' => true]
                ]
            ],
            [
                '$group' => [
                    '_id' => '',
                    'devices' => [
                        '$addToSet' => '$device.mac',
                    ]
                ]
            ],
            ['$unwind' => '$devices'],
            [
                '$group' => [
                    '_id' => '$_id',
                    'count' => ['$sum' => 1]
                ]
            ],
        ]);

        return $devices['result'][0]['count'];

    }


    private function getAccessed($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match' => [
                    'device.branch_id' => ['$in' => $branches_id],
                    'interaction.accessed' => ['$exists' => true]
                ]
            ],
            [
                '$group' => [
                    '_id' => '',
                    'devices' => [
                        '$addToSet' => '$_id',
                    ]
                ]
            ],
            ['$unwind' => '$devices'],
            [
                '$group' => [
                    '_id' => '$_id',
                    'count' => ['$sum' => 1]
                ]
            ],
        ]);

        return $devices['result'][0]['count'];


    }


}
