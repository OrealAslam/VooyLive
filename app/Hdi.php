<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Hdi extends Model
{
	protected $table = 'house_details_infographics';
    protected $fillable = ['name', 'status', 'user_id', 'stripe_id', 'total', 'type'];

    public function User(){
    	return $this->belongsTo('App\User', 'user_id', 'userId');
    }

    public function getTotalHdiOrderFromLastWeek($lastWeekNumber)
    {   
        return static::where(DB::raw("WEEK(house_details_infographics.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(house_details_infographics.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->count();
    }

    public function getTotalHdiSalesFromLastWeek($lastWeekNumber)
    {
        //test
        return static::where(DB::raw("WEEK(house_details_infographics.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(house_details_infographics.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->sum('total');
    }
}
