<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    protected $fillable=['title','phone','email','photo'];

    public function User(){
    	return $this->belongsTo('App\User','userId','userId');
    }
}
