<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User as User;
use App\Prodi;
use Session;
use Image;

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
    	$validator = Validator::make($request->all(), [
            'photo' => 'image|required|max:3000',
        ]);

        if($validator->fails()) {
            Session::flash('error-photo', 'Terdapat errror');
            return redirect()->back()
                ->withErrors($validator);
        }

        $path = "/uploads/userphoto-" . Auth::user()->id . "-" . date("Ymdhis"); 
        $uploadedFile = Image::make($request->file('photo'))
            ->fit(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
            ->save(public_path() . $path ."-100.jpg");

        $uploadedFile = Image::make($request->file('photo'))
            ->fit(60, 60, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
            ->save(public_path() . $path ."-60.jpg");

        $user = User::find(Auth::user()->id);

        $user->profil_img = $path;

        $user->save();

        Session::flash('success', 'Berhasil mengganti gambar profil');
        return redirect()->route('user.edit');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);

        if($validator->fails()) {
            Session::flash('error-password', 'Password dan konfirmasi ada yang salah');
            return redirect()->back()
                ->withErrors($validator);
        }

        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->password);

        Session::flash('success', 'password telah diperbaharui!');
        return redirect()->route('user.edit');

    }
}
