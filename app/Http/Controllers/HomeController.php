<?php

namespace App\Http\Controllers;

use App\TempatMakan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempat_makans = TempatMakan::all();
        return view('home',['tempat_makans'=>$tempat_makans]);
    }
}
