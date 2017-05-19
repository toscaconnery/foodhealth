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
    	return view('FormInputReport');
    }

    public function SubmitReportButton(Request $request)
    {
    	$report = new Report;
    	$report->title = $request->title;
    	$report->description = $request->description;
    	$report->longitude = 0;
    	$report->latitude = 0;
    	$report->isvalidated = 0;
    	if(Auth::check()){
    		$report->staff = Auth::user()->id;
    	}
    	else{
    		$report->staff = 0;
    	}
    	$report->save();

    	return redirect('display-report');
    }
}
