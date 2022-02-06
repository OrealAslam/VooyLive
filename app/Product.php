<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['cat_id','name','price','image','product_code','description','availability','address','upload_image','neighborhood','rush_delivery','custom_charge','rush_delivery_day','rush_delivery_charge','custom_design_charge','is_home_page','actual_price','name_fr','description_fr'];

    // is home page
    // 0 = No
    // 1 = Yes

    // Category Type
    // 0 = Product
    // 1 = Credit

    public function categoryName()
    {
    	return $this->belongsTo('App\Category','cat_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class,'cat_id');
    }

    public function productGallery()
    {
    	return $this->hasOne(ProductGallery::class,'pro_id');
    }
}