<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey='reportId';
    protected $fillable=['address','long','lat','status'];


	public static function checkEmptyValue($str)
	{
       return (!empty($str) ? $str : 'N/A');
    }

    public function City(){
    	return $this->belongsTo('App\City','city_id','id');
    }

}
