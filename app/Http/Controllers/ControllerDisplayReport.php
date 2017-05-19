<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Report;

class ControllerDisplayReport extends Controller
{
    public function LoadDatabase()
    {
    	$this->data['report'] = DB::select('SELECT r.*, u.name FROM report r, users u WHERE u.id = r.Staff');
        return view('ViewDisplayReport', $this->data);
    }

    public function ValidateReport($id)
    {
    	$report = Report::find($id);
        $report->isvalidated = 1;
        $report->save();

        return redirect('display-report');
    }

    public function GetReport()
    {
    	//
    }
}
