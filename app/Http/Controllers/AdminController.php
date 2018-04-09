<?php

namespace App\Http\Controllers;
use App\Prodi;
use App\Tags;
use App\Admin;
use App\Report;
use Session;
use Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
    	return view('admin.index');
    }

    public function loginView() {
        return view('admin.login');
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if($validator->fails()) {
            Session::flash('error', 'nama program studi baru tidak boleh kosong'); 
            return redirect()->route('admin.prodi');
        }

        $prodi->nama = $request->nama;
        $prodi->fakultas = $request->fakultas;
        $prodi->save();

        Session::flash('success', 'Mengganti Program Studi : <b>' . $prodi->nama . ' - '. $prodi->fakultas .'</b>' ); 
        return redirect()->route('admin.prodi');

    }

    public function prodiDelete(Prodi $prodi) {
        $prodi->delete();
        Session::flash('success', '<i class="fa fa-trash"></i> Berhasil menghapus Program Studi : <b>' . $prodi->nama . ' - '. $prodi->fakultas .'</b>' ); 
        return redirect()->route('admin.prodi');
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
        $report = Report::all();
    	return view('admin.laporan', ['reports' => $report]);
    }

    public function deleteReport(Report $report) {
        $report->delete();
        Session::flash('success', '<i class="fa fa-trash"></i> Sukses menghapus laporan'); 
        return redirect()->route('admin.report');
    }

    public function deleteUserFromReport(Report $report) {
        $report->delete();
        return redirect()->route('');
    }

    public function deleteKaryaFromReport(Report $report) {
        $report->delete();
        return redirect()->route('');
    }

    public function adminView() {
        $admin = Admin::all();
    	return view('admin.list', ['admin' => $admin]);
    }

    public function changePassword(Request $request, Admin $admin) {
        $validator = Validator::make($request->all(), [
            'newpassword' => 'required|min:5',
        ]);

        if($validator->fails()) {
            Session::flash('error', 'password untuk ' . $admin->username. 'tidak boleh kosong'); 
            return redirect()->route('admin.user');
        }

        Session::flash('success', '<i class="fa fa-key"></i> Sukses mengganti password'); 
        return redirect()->route('admin.user');

    }

    public function deleteAdmin(Admin $admin){
        $admin->delete();
        Session::flash('success', '<i class="fa fa-trash"></i> Sukses menghapus admin - <b>'. $admin->username .'</b>'); 
        return redirect()->route('admin.user');
    }
    public function registerAdmin(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|alpha_dash|unique:admin',
            'name' => 'required|max:144',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Admin::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->username)
        ]);

        Session::flash('success', 'Sukses menambah administrator'); 
        return redirect()->route('admin.user');
    }
}
