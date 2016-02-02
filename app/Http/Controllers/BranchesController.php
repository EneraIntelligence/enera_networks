<?php

namespace Networks\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('nodes.show');
    }



}
