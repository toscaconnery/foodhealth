<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Report;
use Auth;

class ControllerInputReport extends Controller
{
    public function NewReportButton()
    {
        if(Auth::check()){
            return view('FormInputReport');
        }
    	else{
            return redirect('/');
        }
    }

    public function SubmitReportButton(Request $request)
    {
        if(Auth::check()){
            $report = new Report;
            $report->title = $request->title;
            $report->description = $request->description;
            $report->longitude = 0;
            $report->latitude = 0;
            $report->isvalidated = 0;
            $file = $request->file('berkas');
            $path = "dokumentasi-makanan/";
            $fileextension = $file->getClientOriginalExtension();
            $filename = date("Y-m-d-H-i-s").'.'.$fileextension;
            $file->move($path, $filename);
            $report->imagepath = $path.$filename;

            if(Auth::check()){
                $report->staff = Auth::user()->id;
            }
            else{
                $report->staff = 0;
            }
            $report->save();

            return redirect('display-report');
        }
        else{
            return redirect('/');
        }	
    }
}
