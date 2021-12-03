<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// product_type
// 0 = Credit
// 1 = Product

class UserProduct extends Model
{
    protected $table = 'user_products';

    protected $fillable = ['user_id', 'payment_history_id','product_id','product_type','amount','address','neighborhood','extra_option','custom_design_file_upload','introduction'];

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function user()
    {
    	return $this->hasOne('App\User','userId','user_id');
    }

    public function paymentHistory()
    {
        return $this->hasOne('App\PaymentHistory','id','payment_history_id');
    }

    public function userProductDetail()
    {
        return $this->hasMany('App\UserProductDetail','user_product_id','id')->latest();
    }
}