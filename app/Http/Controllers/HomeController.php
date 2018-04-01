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
        $karya = Karya::orderBy('created_at','DESC')->paginate(5);
        return view('home', ['karya' => $karya]);
    }

    public function karyaList()
    {
        $karya = Karya::with('user')->orderBy('created_at','DESC')->paginate(5);
        return response()->json($karya, 200);
    }
}
