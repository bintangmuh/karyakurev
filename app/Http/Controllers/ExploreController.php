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
    	if ($request->search == NULL) {
			return redirect()->route('explore');
    	}
		return redirect()->route('searchGet', ['query' => $request->search]);
    }

    public function searchGet($request) {
		$keyword = $request;
		$karya = Karya::where('nama', 'LIKE', '%'.$keyword.'%')->orWhere('deskripsi', 'LIKE', '%'.$keyword.'%')->paginate(8);
		return view('explore.search', ['karya' => $karya, 'keyword' => $keyword]);
    }

    public function tags(Tags $tag) {
    	$karya = $tag->karya()->paginate(8);
    	return view('explore.tags', ['tag' => $tag, 'karya' => $karya]);
    }

}
