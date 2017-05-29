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
    public function EditUser($id)
    {
        if(Auth::check()){
            if(Auth::user()->usertype == "Admin"){
                $this->data['user'] = DB::select('SELECT u.* FROM users u WHERE u.id = '.$id)[0];
                //dd($this->data['user']);
                return view('FormModifyAccount', $this->data);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function ValidateData()
    {
    	//
    }

    public function PilihUser()
    {
        if(Auth::check()){
            if(Auth::user()->usertype = "Admin"){
                $this->data['listuser'] = DB::select('SELECT u.* FROM users u');
                return view('PilihUser', $this->data);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function SaveToDB(Request $request, $id)
    {
        //dd("masuk ke fungsi SaveToDB", $request);
        if(Auth::check()){
            if(Auth::user()->usertype = "Admin"){
                $user = User::find($id);
                $myself = User::find(Auth::user()->id);
                //jika authentifikasi cocok
                if(Hash::check($request->currentpassword, $myself->password)){
                    if($request->name != NULL){
                        $user->name = $request->name;
                    }
                    if($request->email != NULL){
                        $user->email = $request->email;
                    }
                    if(($request->password != NULL) and ($request->password == $request->confirmpassword)){
                        //dd('passwordnya berubah');
                        $user->password = bcrypt($request->password);
                        //dd($user->password);
                    }
                    if($request->gender != NULL){
                        $user->gender = $request->gender;
                    }
                    if($request->phone != NULL){
                        $user->phone = $request->phone;
                    }
                    if($request->dob != NULL){
                        $user->dob = $request->dob;
                    }
                    $user->save();
                }
                return redirect('home-admin');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
            	
    }
}
