<?php

namespace Networks\Http\Controllers;

use Illuminate\Http\Request;

use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\Network;
use Session;

class BranchesController extends Controller
{
    protected $network;

    public function __construct()
    {
        $this->network = Session::has('network_id') ?
            Network::find(Session::get('network_id')) :
            auth()->user()->client->networks()->first();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param $network
     */
    public function index()
    {
        return view('branches.index',[
            'branches' => $this->network->branches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
