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
        //session('network_id')
        $branches = Branche::where('network_id', session('network_id'))->get();
        $branches_ids=[];
        foreach($branches as $branch)
        {
            $branches_ids[] = $branch->_id;
        }
        //dd($branches_ids);

        /*
        //array with users ids from campaign logs
        $user_ids = $this->getUsersBybranches( $branches_ids );
        //dd($_ids);

        //array with pairs of pages ids and their count
        $likesCount = $this->getUsersLikesCounted($user_ids, 30);
        //dd($likes);

        //strip the array so it contains only pages ids
        $likes_ids = [];
        foreach($likesCount as $k=>$v){
            $likes_ids[] = $v['_id'];
        }

        //array with pages names
        $words = $this->getPagesNames($likes_ids);
        //dd(words);
        */

        $branches = Network::find(session('network_id'))->branches;

        $devices=$this->getUniqueDevices( $branches_ids );
        $joined=$this->getUniqueJoined( $branches_ids );
        $completed=$this->getAccessed( $branches_ids );


        return view('dashboard.index', [
            'user' => Auth::user(),
            'devices'=>$devices,
            'joined'=>$joined,
            'completed'=>$completed,
            'branches'=>$branches
        ]);
    }



    private function getUniqueDevices($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match'=>[
                    'device.branch_id'=>['$in'=>$branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id'=>'$device.mac'
                ]
            ]
        ]);

        return count($devices['result']);

    }


    private function getUniqueJoined($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match'=>[
                    'device.branch_id'=>['$in'=>$branches_id],
                    'interaction.joined'=>['$exists'=>true]
                ]
            ],
            [
                '$group' => [
                    '_id'=>'$device.mac'
                ]
            ]
        ]);

        return count($devices['result']);

    }


    private function getAccessed($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $devices = $cLogsColl->aggregate([
            [
                '$match'=>[
                    'device.branch_id'=>['$in'=>$branches_id],
                    'interaction.accessed'=>['$exists'=>true]
                ]
            ]
        ]);


        return count($devices['result']);

    }


}
