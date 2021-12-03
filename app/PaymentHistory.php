<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = 'payment_history';

    protected $fillable = ['user_id','category_type','amount','total_amount','payment_type','stripe_response','credit_detail','products','coupon_code_id','coupon_code'];

    public function userDebits()
    {
    	return $this->hasOne('App\UserDebit','payment_history_id','id');
    }
}
