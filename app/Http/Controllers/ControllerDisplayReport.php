<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ControllerDisplayReport extends Controller
{
    public function LoadDatabase()
    {
    	$this->data['report'] = DB::select('SELECT r.*, u.name FROM report r, users u WHERE u.id = r.Staff');
        return view('ViewDisplayReport', $this->data);
    }

    public function ValidateReport()
    {
    	//
    }

    public function GetReport()
    {
    	//
    }
}
