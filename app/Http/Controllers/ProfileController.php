<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function view()
    {
    	return view('profile')->with(['user' => Auth::user()]);
    }
    public function edit()
    {
    	
    }
}
