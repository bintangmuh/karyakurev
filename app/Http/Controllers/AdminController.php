<?php

namespace App\Http\Controllers;
use App\Prodi;
use App\Tags;
use Session;
use Validator;
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

    public function prodiPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if($validator->fails()) {
            Session::flash('error', 'nama program studi baru tidak boleh kosong'); 
            return redirect()->route('admin.prodi');
        }
        $prodi = Prodi::create([
            'nama' => $request->nama,
            'fakultas' => $request->fakultas
        ]);

        Session::flash('success', 'Menambah Program Studi : <b>' . $prodi->nama . ' - '. $prodi->fakultas .'</b>' ); 
        return redirect()->route('admin.prodi');
    }

    public function prodiEdit(Request $request, Prodi $prodi) {

    }

    public function prodiDelete(Prodi $prodi) {
        $prodi->delete();

    }

    public function tagView() {
    	$tags = Tags::all();
    	return view('admin.tag', ['tags' => $tags]);
    }

    public function tagPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'tags' => 'required|max:50',
        ]);

        if($validator->fails()) {
            Session::flash('error', 'tidak boleh kosong dan maksimal 50 karakter'); 
            return redirect()->route('admin.tags');
        }

        $tags = Tags::create(['tag' => $request->tags]);
        Session::flash('success', 'Sukses menambah tag - <b>' . $request->tags . '</b>'); 
        return redirect()->route('admin.tags');
    }    

    public function tagDelete(Tags $tags) {
        $tags->delete();
        Session::flash('success', '<i class="fa fa-trash"></i> Sukses menghapus tag - <b>' . $tags->tag . '</b>'); 
        return redirect()->route('admin.tags');
    }

    public function reportView() {
    	return view('admin.laporan');
    }

    public function adminView() {
    	return view('admin.index');
    }
}
