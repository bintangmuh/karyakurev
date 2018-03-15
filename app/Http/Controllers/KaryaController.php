<?php

namespace App\Http\Controllers;

use App\Karya;
use Illuminate\Http\Request;
use Validator;
use Auth;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Karya::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karya.tambah');
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:144',
            'deskripsi' => ''
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Store the data
        $karya = new Karya();
        $karya->user_id = Auth::user()->id;
        $karya->nama = $request->nama;
        $karya->deskripsi = $request->deskripsi;
        $karya->save();

        return $karya->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function show(Karya $karya)
    {
        return $karya->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function edit(Karya $karya)
    {
        return view('karya.sunting', ['karya' => $karya]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karya $karya)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:144',
            'deskripsi' => ''
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $karya->nama = $request->nama;
        $karya->deskripsi = $request->deskripsi;
        $karya->save();

        return view('karya.sunting', ['karya' => $karya, 'success' => 'Berhasil mengubah informasi karya: '. $karya->nama]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karya $karya)
    {
        $karya->delete();
        return "karya deleted";
    }

    public function addImages(Request $request, Karya $karya)
    {
        
    }

    public function addVideos(Request $request, Karya $karya)
    {
        //getting url coy
    }

    public function addThumbs(Request $request, Karya $karya)
    {
        $validator = Validator::make($request->all(), [
            'thumbs' => 'required|file',
        ]);
    }
}
