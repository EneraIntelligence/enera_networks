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
        return view('campaign.index', [
            'campaigns' => auth()->user()->campaigns,
        ]);
    }

}
