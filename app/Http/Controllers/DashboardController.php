<?php

namespace Networks\Http\Controllers;

use Illuminate\Http\Request;

use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Dashboard";
    }
}
