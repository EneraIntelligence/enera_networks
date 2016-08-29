<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navData= array();
        $navData['reports']='active';
        
        return view('reports.index', compact('navData'));
    }

    public function users()
    {
        $navData= array();
        $navData['reports']='active';

        return view('reports.users', compact('navData'));
    }

    public function devices()
    {
        $navData= array();
        $navData['reports']='active';

        return view('reports.devices', compact('navData'));
    }

    public function campaigns()
    {
        $navData= array();
        $navData['reports']='active';

        return view('reports.campaigns', compact('navData'));
    }


    public function branches()
    {
        $navData= array();
        $navData['reports']='active';

        return view('reports.branches', compact('navData'));
    }

    public function access()
    {
        $navData= array();
        $navData['reports']='active';

        return view('reports.access', compact('navData'));
    }


    public function settings()
    {
        return view('profile.settings');
    }
    
}
