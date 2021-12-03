<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'cities';

	protected $primaryKey='id';

	protected $fillable = ['name', 'province_id'];

    public function Province(){
    	return $this->belongsTo('App\Province','province_id','id');
    }

    public function Report(){
        return $this->hasMany('App\Report','city_id', 'id');
    }


    public function getAllCities () 
    {
    	$cities = City::all();
    	print_r($cities);
    	die();
    }

}
