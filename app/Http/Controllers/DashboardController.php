<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use DB;
use MongoId;
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

        $branches = Network::find(session('network_id'))->branches;
        $devices=0;
        $joined=0;
        //$loaded=0;
        $completed=0;
        foreach($branches as $b)
        {
            $devices+=$b->campaign_logs()->distinct('device.mac')->get()->count();
            $joined+=$b->campaign_logs()->distinct('device.mac')->where('interaction.joined','exists',true)->get()->count();
            //$loaded+=$b->campaign_logs()->where('interaction.loaded','exists',true)->get()->count();
            $completed+=$b->campaign_logs()->where('interaction.accessed','exists',true)->get()->count();
        }

        /*
        if($loaded>0)
            $completed = ceil($completed/$loaded);
        else
            $completed=0;
        */

        return view('dashboard.index', ['user' => Auth::user(),'words'=>$words,'wordCount'=>$likesCount,
            'devices'=>$devices,'joined'=>$joined,'completed'=>$completed,'branches'=>$branches]);
    }

    private function getUsersByBranches($branches_id)
    {
        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');

        //get all the users _ids into an array
        $users = $cLogsColl->aggregate([
            [
                '$match'=>[
                    'device.branch_id'=>['$in'=>$branches_id]
                ]
            ],
            [
                '$group' => [
                    '_id'=>'none',
                    'ids'=>['$addToSet'=>'$user.id']
                ]
            ]
        ]);

        $_ids=[];


        //conversion of string ids to MongoIds
        if(count($users['result'])>0)
        {
            $userIdsArray = $users['result'][0]['ids'];

            foreach($userIdsArray as $separateIds){
                $_ids[] = $separateIds instanceof MongoId ? $separateIds : new MongoId($separateIds);
            }
        }

        return $_ids;

    }

    private function getUsersLikesCounted($user_ids, $limit)
    {
        $likes = DB::getMongoDB()->selectCollection('users')->aggregate([
            [
                '$match'=>[
                    '_id'=>['$in'=>$user_ids]
                ],
            ],
            [
                '$unwind'=>'$facebook.likes'
            ],
            [
                '$group' => [
                    '_id'=>'$facebook.likes',
                    'count'=>['$sum'=>1]
                ]
            ],
            [
                '$sort'=>['count'=>-1]
            ],
            [
                '$limit'=>$limit
            ]
        ]);

        //returns array with [_id=val,count=>val]
        return $likes['result'];
    }

    private function getPagesNames($pages_ids)
    {
        $FbColl = DB::getMongoDB()->selectCollection('facebook_pages');
        $pages_cursor = $FbColl->aggregate([
            [
                '$match'=>[
                    'id'=>['$in'=>$pages_ids]
                ]
            ],
            [
                '$project'=>[
                    '_id'=>'$id',
                    'name'=>1
                ]
            ]
        ]);

        return $pages_cursor['result'];

    }
}
