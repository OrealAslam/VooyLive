<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transactions extends Model
{
    protected $primaryKey='transactionId';
    protected $fillable = ['amount', 'userId','planId','code'];
    public function User(){
    	return $this->belongsTo('App\User','userId','userId');
    }

    public function getTotalSalesFromLastWeek($lastWeekNumber)
    {
        //test
        return static::where(DB::raw("WEEK(transactions.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(transactions.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->sum('amount');
    }

}
