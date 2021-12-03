<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterLinks extends Model
{
	protected $table = 'register_links';
	
    protected $fillable =['id','link','status','plan_id'];

    public function Plan(){
    	return $this->belongsTo('App\Plan','plan_id','planId');
    }
}
