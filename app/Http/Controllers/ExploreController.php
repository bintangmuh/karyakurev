<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Karya;
use App\Tags;
use App\User;
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
		$user = User::where('name', 'LIKE', '%'.$keyword.'%')->pluck('id');

        $karya = Karya::where('nama', 'LIKE', '%'.$keyword.'%')
                        ->orWhereIn('user_id', $user)->paginate(8);

		return view('explore.search', ['karya' => $karya, 'keyword' => $keyword]);
    }

    public function tags(Tags $tag) {
    	$tags = Tags::all();
    	$karya = $tag->karya()->paginate(8);
    	return view('explore.tags', ['tag' => $tag, 'karya' => $karya, 'tags' => $tags]);
    }

}
