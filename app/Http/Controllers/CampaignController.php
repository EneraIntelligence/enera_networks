<?php

namespace Networks\Http\Controllers;

use Illuminate\Http\Request;

use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::where('administrator_id', auth()->user()->_id)->get();
        return view('campaign.index', ['campaigns' => $campaigns]);
    }

}
