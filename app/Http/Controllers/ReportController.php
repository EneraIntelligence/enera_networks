<?php

namespace Networks\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use Networks\Campaign;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\SummaryNetwork;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navData = array();
        $navData['reports'] = 'active';

        return view('reports.index', [
            'navData' => $navData
        ]);
    }

    public function users()
    {
        $summary_network = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->first();
        $w2 = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->skip(7)->first();

        $male = isset($summary_network->accumulated['users']['demographic']['male']) ? $summary_network->accumulated['users']['demographic']['male'] : [];
        $female = isset($summary_network->accumulated['users']['demographic']['female']) ? $summary_network->accumulated['users']['demographic']['female'] : [];

        $male_interactions = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->take(7)->select('accumulated.users.demographic.male')->get();
        $female_interactions = SummaryNetwork::where('network_id', session('network_id'))->orderBy('date', 'desc')->take(7)->select('accumulated.users.demographic.female')->get();

        //TODO hacer más bonito la agrupación de edades
        $m = ["Hombres", 0, 0, 0, 0, 0];
        foreach ($male as $key => $ma) {
            if ($key >= 0 && $key <= 17) {
                $m[1] += $ma * -1;
            } else if ($key >= 18 && $key <= 34) {
                $m[2] += $ma * -1;
            } else if ($key >= 35 && $key <= 45) {
                $m[3] += $ma * -1;
            } else if ($key >= 46 && $key <= 60) {
                $m[4] += $ma * -1;
            } else {
                $m[5] += $ma * -1;
            }
        }

        $f = ["Mujeres", 0, 0, 0, 0, 0];
        foreach ($female as $key => $fe) {
            if ($key >= 0 && $key <= 17) {
                $f[1] += $fe;
            } else if ($key >= 18 && $key <= 34) {
                $f[2] += $fe;
            } else if ($key >= 35 && $key <= 45) {
                $f[3] += $fe;
            } else if ($key >= 46 && $key <= 60) {
                $f[4] += $fe;
            } else {
                $f[5] += $fe;
            }
        }
        $edad_tota_hombres = 0;
        $conteo_hombres = 0;

        if ($summary_network) {
            foreach ($summary_network->accumulated['users']['demographic']['male'] as $key => $value) {
                $edad_tota_hombres += $key * $value;
                $conteo_hombres += $value;
            }
        }

        $edad_tota_mujeres = 0;
        $conteo_mujeres = 0;
//        dd($summary_network ? $summary_network->accumulated['users']['demographic']['male'] : 0);
        if ($summary_network) {
            foreach ($summary_network->accumulated['users']['demographic']['female'] as $key => $value) {
                $edad_tota_mujeres += $key * $value;
                $conteo_mujeres += $value;
            }
        }


        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Usuarios'];


        return view('reports.users', [
            'navData' => $navData,
            'male' => $m,
            'female' => $f,
            'total' => $summary_network ? $summary_network->accumulated['users']['total'] : 0,
            'total_male' => $summary_network ? array_sum($summary_network->accumulated['users']['demographic']['male']) : 0,
            'total_female' => $summary_network ? array_sum($summary_network->accumulated['users']['demographic']['female']) : 0,
            'promedio_hombres' => $summary_network ? $edad_tota_hombres / $conteo_hombres : 0,
            'promedio_mujeres' => $summary_network ? $edad_tota_mujeres / $conteo_mujeres : 0,
        ]);
    }

    public function devices()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Dispositivos'];

        return view('reports.devices', [
            'navData' => $navData
        ]);
    }

    public function campaigns()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Campañas'];

        return view('reports.campaigns', [
            'navData' => $navData
        ]);
    }


    public function branches()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Nodos'];

        return view('reports.branches', [
            'navData' => $navData
        ]);
    }

    public function access()
    {
        $navData = array();
        $navData['reports'] = 'active';
        $navData['breadcrumbs'] = ['reports', 'Accesos'];

        return view('reports.access', ['navData' => $navData]);
    }


    public function settings()
    {
        return view('profile.settings');
    }

}
