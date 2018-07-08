<?php

namespace App\Http\Controllers;

use App\Karya;
use App\Tags;
use App\Gallery;
use App\Video;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use Image;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Tags::all();
        $karya = Karya::select('nama', 'id')->with('tags')->get();
        return $karya;
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

        Session::flash('success', 'Profil telah diperbaharui!');

        return redirect()->route('karya.tampil', ['karya' => $karya]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function show(Karya $karya)
    {
        return view('karya.lihat', ['karya' => $karya]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function edit(Karya $karya)
    {
        $this->unauthorizedAccess($karya);
        $tags = Tags::all();
        $selected = $karya->tags->pluck('id');
        return view('karya.sunting', ['karya' => $karya, 'tags' => $tags, 'selected' => $selected]);
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
        $this->unauthorizedAccess($karya);
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
        $karya->tags()->sync($request->get('tags'));

        $karya->save();

        Session::flash('success', 'Karya telah diperbaharui!');
        return redirect()->route('karya.edit', ['karya' => $karya]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karya $karya)
    {
        $this->unauthorizedAccess($karya);
        $karya->delete();
        return "karya deleted";
    }

    public function addImage(Request $request, Karya $karya)
    {
        $this->unauthorizedAccess($karya);
        $process = $this->uploadImg('gallery', $request->get('image'), $karya);
        $gallery = new Gallery([
            'user_id' => Auth::user()->id,
            'img_url' => $process
        ]);
        $karya->gallery()->save($gallery);
        return response()->json(['success' => 'You have successfully uploaded an image' . $process, 'image' => $gallery ], 200);
    }

    public function addVideo(Request $request, Karya $karya)
    {
        $this->unauthorizedAccess($karya);
        $validator = Validator::make($request->all(), [
            'youtubeurl' => 'required|active_url'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $url = $this->youtube_id_from_url($request->youtubeurl);

        if ($url == false) {
            return response()->json(['youtubeurl' => 'Maaf Youtube URL anda tidak valid'], 422);
        }
        $video = new Video(['youtube_url' => $url]);
        $karya->videos()->save($video);

        return response()->json(['success' => 'Berhasil menambahkan youtube video', 'video' => $video], 200);

    }
    // remove image
    public function removeImage(Karya $karya, Request $request)
    {
        $this->unauthorizedAccess($karya);
        $image = Gallery::findOrFail($request->image);
        $image->delete();
        return response()->json(['success' => 'Berhasil menghapus gambar galeri'], 200);
    }

    // Remove youtube video 
    public function removeVideo(Karya $karya, Request $request)
    {
        $this->unauthorizedAccess($karya);
        $video = Video::findOrFail($request->video);
        $video->delete();
        return response()->json(['success' => 'Berhasil menghapus youtube video'], 200);
    }

    //Tambah thumbnail
    public function addThumbs(Request $request, Karya $karya)
    {
        $this->unauthorizedAccess($karya);
        $validator = Validator::make($request->all(), [
            'thumbs' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $path = "/uploads/thumbs-" . $karya->id . "-" . date("Ymdhis").".jpg"; 
        $uploadedFile = Image::make($request->get('thumbs'))
            ->fit(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
            ->save(public_path() . $path);

        $karya->img_thumb = $path;
        $karya->save();
        
        return response()->json(['success', 'Thumbnail telah ditambahkan', 'thumbs' => $path], 200);
    }

    // upload image function
    public function uploadImg(String $type, $file, Karya $karya) {
        $path = "/uploads/" . $type . "-" . $karya->id . "-" . date("Ymdhis").".jpg"; 
        $uploadedFile = Image::make($file)
            ->resize(null, 700, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
            ->save(public_path() . $path);
        
        return $path;
    }

    public function unauthorizedAccess(Karya $karya) {
        if (Auth::user()->id == $karya->user_id) {
            return response()->view('errors.403');
        }
    }

    // parsing youtube url
    function youtube_id_from_url($url) {
        $pattern =
            '%^# Match any YouTube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
            youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
            (?:           # Group path alternatives
              /embed/     # Either /embed/
            | /v/         # or /v/
            | /watch\?v=  # or /watch\?v=
            )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{10,12})  # Allow 10-12 for 11 char YouTube id.
            $%x'
        ;
        $result = preg_match($pattern, $url, $matches);
        
        if (false !== $result) {
            return $matches[1];
        }
        
        return false;
    }
}
