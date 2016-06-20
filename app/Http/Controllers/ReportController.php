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


    public function settings()
    {
        return view('profile.settings');
    }
    
}
