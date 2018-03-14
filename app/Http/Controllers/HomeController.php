<?php

namespace App\Http\Controllers;

use App\Karya as Karya;
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
        $karya = Karya::all();
        return view('home', ['karya' => $karya]);
    }
}
