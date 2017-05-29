<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Hash;
use Auth;

class ControllerAddAccount extends Controller
{
    public function AddUser()
    {
        if(Auth::check()){
            if(Auth::user()->usertype == "Admin"){
                return view('FormAddAccount');
            }
            else return redirect('/');
        }
        else return redirect('/');  	
    }

    public function ValidateData()
    {
    	//
    }

    public function SaveToDB(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->usertype == "Admin"){
                $myself = User::find(Auth::user()->id);
                //jika authentifikasi cocok
                if(Hash::check($request->currentpassword, $myself->password)){
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->gender = $request->gender;
                    $user->phone = $request->phone;
                    $user->dob = $request->dob;
                    $user->usertype = $request->usertype;
                    $file = $request->file('berkas');
                    $path = "image/";
                    $fileextension = $file->getClientOriginalExtension();
                    $filename = date("Y-m-d-H-i-s").'.'.$fileextension;
                    $file->move($path, $filename);
                    $user->imagepath = $path.$filename;
                    $user->save();
                    return redirect('home-admin');
                }
                else{
                    return redirect('home-admin');
                }
            }else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
            	
    }
}
