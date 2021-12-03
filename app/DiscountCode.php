<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $fillable =['name','code','value','type','startDate','endDate','times','status'];
}
