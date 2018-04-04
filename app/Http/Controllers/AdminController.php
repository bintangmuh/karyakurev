<?php

namespace App\Http\Controllers;
use App\Prodi;
use App\Tags;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
    	return view('admin.index');
    }

    public function prodiView() {
    	$prodi = Prodi::all();
    	return view('admin.prodi', ['prodi' => $prodi]);
    }

    public function tagView() {
    	$tags = Tags::all();
    	return view('admin.tag', ['tags' => $tags]);
    }

    public function reportView() {
    	return view('admin.index');
    }

    public function adminView() {
    	return view('admin.index');
    }
}
