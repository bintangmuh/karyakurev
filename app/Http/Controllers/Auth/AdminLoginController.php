<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Validation;

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
    		// redirect if auth
    		return redirect()->intended(route('admin.index'));
    	}

    	// unsuccessfull attempt
    	return redirect()->back()->withInput($request->only('username'))->withErrors();
    }

    // logout
    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.login');
    }
}
