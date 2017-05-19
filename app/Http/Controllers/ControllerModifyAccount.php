<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Hash;
use App\User;

class ControllerModifyAccount extends Controller
{
    public function EditUser()
    {
        $this->data['user'] = DB::select('SELECT u.* FROM users u WHERE u.id = '.Auth::user()->id)[0];

    	return view('FormModifyAccount', $this->data);
    }

    public function ValidateData()
    {
    	//
    }

    public function SaveToDB(Request $request)
    {
    	$user = User::find(Auth::user()->id);
        if(Hash::check($request->currentpassword, $user->password)){
            if(isset($request->name)){
                $user->name = $request->name;
            }
            if(isset($request->email)){
                $user->email = $request->email;
            }
            if(isset($request->password) and ($request->password == $request->confirmpassword)){
                //dd($user->password);
                $user->password = bcrypt($request->password);
                //dd($user->password);
            }
            if(isset($request->gender)){
                $user->gender = $request->gender;
            }
            if(isset($request->Phone)){
                $user->phone = $request->phone;
            }
            if(isset($request->DoB)){
                $user->dob = $request->dob;
            }
            $user->save();
        }
        return redirect('/home');
    }
}
