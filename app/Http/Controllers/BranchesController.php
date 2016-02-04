<?php

namespace Networks\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use Networks\Branche;
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
        $branch = Branche::find($id);
        if ($branch && $branch->network_id == session('network_id')) {
            return view('branches.show', [
                'branch' => $branch,
                'network' => Network::find(session('network_id')),
                'devices' => $branch->campaign_logs()->distinct('device.mac')->get(),
            ]);
        } else {
            return redirect()->route('branches::index')->with([
                'n_type' => 'danger',
                'n_timeout' => 5000,
                'n_msg' => 'Nodo no encontrado.'
            ]);
        }
    }

}
