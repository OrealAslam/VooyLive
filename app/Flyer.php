<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Flyer extends Model
{
    protected $fillable = ['name', 'status', 'user_id', 'stripe_id', 'total', 'type'];

    public function User(){
    	return $this->belongsTo('App\User', 'user_id', 'userId');
    }

    public function getTotalFpsOrderFromLastWeek($lastWeekNumber)
    {   
        return static::where(DB::raw("WEEK(flyers.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(flyers.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->count();
    }

    public function getTotalFpsSalesFromLastWeek($lastWeekNumber)
    {
        //test
        return static::where(DB::raw("WEEK(flyers.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(flyers.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->sum('total');
    }

}
