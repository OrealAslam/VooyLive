<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
	protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'first_name','middle_name','last_name','city','state','zipcode','password','work_email','confirm_password','coupon_code','card_number','cvc','created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function plan(){
       // return $this->hasOne('App\Models\Plan','');
    }
}
