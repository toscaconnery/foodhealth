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
    	$report->Title = $request->Title;
    	$report->Description = $request->Description;
    	$report->Longitude = 0;
    	$report->Latitude = 0;
    	$report->IsValidated = 0;
    	if(Auth::check()){
    		$report->Staff = Auth::user()->id;
    	}
    	else{
    		$report->Staff = 0;
    	}
    	$report->save();

    	return redirect('home');
    }
}
