<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProductDetail extends Model
{
    protected $table = 'user_product_detail';

    protected $fillable = ['user_product_id', 'note','file','emails'];
}