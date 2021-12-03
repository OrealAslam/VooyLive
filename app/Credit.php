<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //
    protected $fillable = ['descr', 'user_id', 'type', 'product', 'referred_by', 'referred_to', 'credit'];

    public function User(){
    	return $this->belongsTo('App\User', 'user_id', 'userId');
    }

    public function ReferredBy(){
    	return $this->belongsTo('App\User', 'referred_by', 'userId');
    }

    public function ReferredTo(){
    	return $this->belongsTo('App\User', 'referred_to', 'userId');
    }
}
