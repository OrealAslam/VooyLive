<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey='reportId';
    protected $fillable=['address','long','lat','status','postal_code','street_number','route','locality','administrative_area_level_1'];


	public static function checkEmptyValue($str)
	{
       return (!empty($str) ? $str : 'N/A');
    }

    public function City(){
    	return $this->belongsTo('App\City','city_id','id');
    }

}
