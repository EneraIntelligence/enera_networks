<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use DB;
use MongoId;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cLogsColl = DB::getMongoDB()->selectCollection('campaign_logs');
        $users = $cLogsColl->aggregate([
            [
                '$group' => [
                    '_id'=>'none',
                    'ids'=>['$addToSet'=>'$user.id']
                ]
            ]
        ]);

        $userIdsArray = $users['result'][0]['ids'];

        foreach($userIdsArray as $separateIds){
            $_ids[] = $separateIds instanceof MongoId ? $separateIds : new MongoId($separateIds);
        }
        //dd($_ids);

        $likes = DB::getMongoDB()->selectCollection('users')->aggregate([
            [
                '$match'=>[
                    '_id'=>['$in'=>$_ids]
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
                '$limit'=>30
            ]
        ]);

        //dd($likes['result']);

        foreach($likes['result'] as $k=>$v){
            //dd($v);
            $likes_ids[] = $v['_id'];
            $likes_counts[] = $v['count'];
        }

        $FbColl = DB::getMongoDB()->selectCollection('facebook_pages');
        $pages_cursor = $FbColl->aggregate([
            [
                '$match'=>[
                    'id'=>['$in'=>$likes_ids]
                ]
            ],
            [
                '$project'=>[
                    '_id'=>'$id',
                    'name'=>1
                ]
            ]
        ]);

        //$pages_cursor = array_merge($pages_cursor['result'],$likes_counts);
        //dd($pages_cursor);
        $words = $pages_cursor['result'];
        $wordCount = $likes['result'];

//        dd($wordCount);

        return view('dashboard.index', ['user' => Auth::user(),'words'=>$words,'wordCount'=>$wordCount]);
    }
}
