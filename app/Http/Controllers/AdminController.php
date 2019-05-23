<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Session;
use DB;
use App\Charts;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware(['auth','admin']);
	}
	public function index(Request $request){
		return view('admin/dashboard');
	}
    public function getAllUsers(Request $request){
    	$num_users = count(User::all());//get all registered users
    	$num_students = count(User::where('user_type','=','student')->get());//get number of student accounts
    	$num_admin =  count(User::where('user_type','=','superuser')->get());//get number of administraotrs

    	/**
		next, we'll get the number of logged-in users
    	*/
    	$time =  time() - (config('session.lifetime')*60); 
    	$logged_users = Session::where('last_activity','>=', $time)->
     		count(DB::raw('DISTINCT user_id'));//get the number of users logged even if using multiple devices
     	$logged_devices = count(Session::where('last_activity','>=', $time)->
     get());
    	return response()->json(['num_users'=> $num_users, 'num_students'=>$num_students,
    		'num_admin'=>$num_admin,
    		'logged_users'=>$logged_users,
    		'logged_devices'=>$logged_devices],200);
    }
    public function uploadGame(Request $request) {
    	//todo
    }

    public function getChartOnUsers(Request $request){
       
    }
}
