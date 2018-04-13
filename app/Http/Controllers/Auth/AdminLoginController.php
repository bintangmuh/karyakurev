<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Validation;
use Session;

class AdminLoginController extends Controller
{
	function __construct()
	{
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}
    public function showLoginForm()
    {
    	return view('admin.login');
    }

    public function login(Request $request) 
    {
    	$this->validate($request, [
    		'username' => 'required|alpha_dash',
    		'password' => 'required',
    	]);

    	// attempt login admin
    	if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
    		return redirect()->intended(route('admin.index'));
    	}

    	// unsuccessfull attempt
        Session::flash('error', 'Data untuk login ke administrator salah'); 
    	return redirect()->back()->withInput($request->only('username'));
    }

    // logout
    public function logout()
    {
    	Auth::guard('admin')->logout();
        Session::flash('success', 'Anda berhasil logout'); 
    	return redirect()->route('admin.login');
    }
}
