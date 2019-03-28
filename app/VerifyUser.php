<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $fillable = ['user_id','token'];
    public function user(){
    	$this>belongsTo('App\User');
    }
}
