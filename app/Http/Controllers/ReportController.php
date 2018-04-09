<?php

namespace App\Http\Controllers;
use App\Report;
use App\Karya;
use Illuminate\Http\Request;
use Validator;
use Session; 

class ReportController extends Controller
{
    public function reportView(Karya $karya)
    {
    	return view('karya.report', ['karya' => $karya]);
    }

    public function reportPost(Karya $karya, Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'alasan' => 'required|max:255',
           	'email' => 'required|email'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $report = Report::create([
        	'alasan' => $request->alasan,
        	'pelapor' => $request->email,
        	'karya_id' => $karya->id
        ]);

        Session::flash('success', 'Berhasil melaporkan karya'); 
        return redirect()->route('report', ['karya' => $karya]);

    }
}
