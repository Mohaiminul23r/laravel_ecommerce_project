<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){

    	return view('admin.login');
    }

    public function dashboard(){

    	return view('admin.layout');
    }

    public function adminLogin(Request $request){
    	//echo "ok";
    	$email = $request->adminemail;
    	$password = md5($request->adminpassword);

    	$result = DB::table('admin')
        ->where('email', $email)
        ->where('password', $password)
        ->first();

        if($result){
        	Session::put('admin_name', $result->name);
        	Session::put('admin_id', $result->id);
        	return Redirect::to('/admin-login-page');
        }else{
        	Session::put('message', 'Invalid password and email');
        	//return Redirect::to('/admin-login-page');
        	return Redirect::to('/admin-dashboard');
        	echo Admin::all();
        }
	}   	
}
   

