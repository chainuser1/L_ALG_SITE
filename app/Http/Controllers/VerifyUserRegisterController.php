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
    		return response()->json(['message'=>'Username is ready for pick up',
    			'status'=> 'true', 'class'=>'green-text'],200);
    	}
    	else{
    		return response()->json(['message'=>'Username is already used.',
    			'status'=> 'false', 'class'=>'orange-text'],200);
    	}
    }

    public function validateEmail(Request $req){
    	$user=User::where('email','=',$req->email)->get();
    	if($user->isEmpty()){
    		return response()->json([
    			'status'=> true],200);
    	}
    	else{
    		return response()->json([
    			'status'=> false],200);
    	}
    }


}
