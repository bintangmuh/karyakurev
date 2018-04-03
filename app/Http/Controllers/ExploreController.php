<?php

namespace App\Http\Controllers;
use App\Karya;
use App\Tags;
use Illuminate\Http\Request;

class ExploreController extends Controller
{

    public function explore() {
    	$tags = Tags::all();
    	$karya  = Karya::orderBy('created_at','DESC')->paginate(8);
    	return view('explore.index', ['karya' => $karya, 'tags'=> $tags]);
    }

    public function search(Request $request) {
    	$karya  = Karya::select('id, nama, created_at')->paginate(5);
    	return view('explore.index', ['karya' => $karya]);
    }
    public function tags(Tags $tag) {

    }

}
