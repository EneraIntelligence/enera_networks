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
        
        return view('reports.index', [
            'navData' => $navData
        ]);
    }

    public function users()
    {
        $navData= array();
        $navData['reports']='active';
        $navData['breadcrumbs']=['reports','Usuarios'];

        return view('reports.users', [
            'navData' => $navData
        ]);
    }

    public function devices()
    {
        $navData= array();
        $navData['reports']='active';
        $navData['breadcrumbs']=['reports','Dispositivos'];

        return view('reports.devices', [
            'navData' => $navData
        ]);
    }

    public function campaigns()
    {
        $navData= array();
        $navData['reports']='active';
        $navData['breadcrumbs']=['reports','Campañas'];

        return view('reports.campaigns', [
            'navData' => $navData
        ]);
    }


    public function branches()
    {
        $navData= array();
        $navData['reports']='active';
        $navData['breadcrumbs']=['reports','Nodos'];

        return view('reports.branches', [
            'navData' => $navData
        ]);
    }

    public function access()
    {
        $navData= array();
        $navData['reports']='active';
        $navData['breadcrumbs']=['reports','Accesos'];

        return view('reports.access', ['navData' => $navData]);
    }


    public function settings()
    {
        return view('profile.settings');
    }
    
}
