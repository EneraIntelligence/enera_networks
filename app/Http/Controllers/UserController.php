<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navData=array(
            "hideNetworkSelector"=>true,
            "profileState"=> "active"
        );
        
        $all = Campaign::where('administrator_id', Auth::user()->_id)->limit(10)->get();
        $active = Campaign::where('administrator_id', Auth::user()->_id)->where('status', 'active')->count();
        $closed = Campaign::where('administrator_id', Auth::user()->_id)->where('status', 'closed')->count();
        $canceled = Campaign::where('administrator_id', Auth::user()->_id)->where('status', 'canceled')->count();
        return view('profile.index', ['user' => Auth::user(), 'all' => $all, 'active' => $active, 'closed' => $closed, 'canceled' => $canceled, 'navData'=>$navData]);
    }


}
