<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class ControllerAddAccount extends Controller
{
    public function AddUser()
    {
    	return view('FormAddAccount');
    }

    public function ValidateData()
    {
    	//
    }

    public function SaveToDB(Request $request)
    {
    	$user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->usertype = $request->usertype;
        $user->save();
        return redirect('display-report');
    }
}
