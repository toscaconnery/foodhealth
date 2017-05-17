<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ControllerInputReport extends Controller
{
    public function NewReportButton()
    {
    	return view('FormInputReport');
    }

    public function SubmitReportButton()
    {
    	//
    }
}
