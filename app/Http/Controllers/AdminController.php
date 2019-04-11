<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware(['auth','admin']);
	}
	public function index(Request $request){
		return view('admin/dashboard');
	}
    public function getAllUsers(Request $request){
    	return DB::select('users')->get()->toJson();
    }

    public function uploadGame(Request $request) {
    	//todo
    }
}
