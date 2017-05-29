<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Report;
use Auth;

class ControllerDisplayReport extends Controller
{
    public function LoadDatabase()
    {
        if(Auth::check()){
            if(Auth::user()->usertype == "Supervisor"){
                $this->data['report'] = DB::select('SELECT r.*, u.name FROM report r, users u WHERE u.id = r.Staff');
                return view('ViewDisplayReport', $this->data);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
            	
    }

    public function ValidateReport($id)
    {
        if(Auth::check()){
            if(Auth::user()->usertype == "Supervisor"){
                $report = Report::find($id);
                $report->isvalidated = 1;
                $report->save();

                return redirect('web/display-report');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
            	
    }

    public function GetReport()
    {
    	//
    }
}
