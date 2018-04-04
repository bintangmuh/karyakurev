<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User as User;
use App\Prodi;
use Session;

class ProfileController extends Controller
{
    public function view()
    {
    	return view('user.view')->with(['user' => Auth::user()]);
    }

    public function viewUser(User $user)
    {
        return view('user.view')->with(['user' => $user]);
    }

    public function viewKaryaUser(User $user)
    {
        $karya = $user->karya()->orderBy('created_at', 'DESC')->simplePaginate(6);
        return response()->json($karya, 200);
    }


    public function editview()
    {
        $prodiList = Prodi::all();
    	return view('user.edit', ['user' => Auth::user(), 'prodiList' => $prodiList ]);
    }
    public function edit(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:144',
            'nim' => 'numeric',
            'email' => 'email'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

    	$user = User::find(Auth::user()->id);

    	$user->name = $request->name;
    	$user->nim = $request->nim;
        $user->email = $request->email;
    	$user->prodi_id = $request->prodi;

    	$user->save();
    	Session::flash('success', 'Profil telah diperbaharui!');

    	return redirect()->route('user.edit');
    }
    public function changeProfileImg(Request $request)
    {
    	# code...
    }
}
