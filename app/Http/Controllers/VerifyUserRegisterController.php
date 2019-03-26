<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class VerifyUserRegisterController extends Controller
{
    //
    public  function __construct(){
    	$this->middleware('guest');
    }
    //returns json data for ajax validation
    public function validateUsername(Request $req){
    	$user=User::where('username','=',$req->username)->get();
    	if($user->isEmpty()){
    		return response()->json(['message'=>'Username is valid',
    			'status'=> 'true', 'class'=>'green-text'],200);
    	}
    	else{
    		return response()->json(['message'=>'Username is invalid',
    			'status'=> 'false', 'class'=>'red-text'],200);
    	}
    }


}
