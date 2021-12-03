<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    protected $fillable = ['total', 'reportId','userId','stripe_id','type', 'address'];
    protected $primaryKey='orderId';

    public function user()
    {
        return $this->hasOne('App\User','userId','userId');
    }
 
    public function report()
    {
        return $this->hasOne('App\Report','reportId','reportId');
    }

    public function getColumnChartMoneyMonthly($planType)
    {
        return static::select("orders.*",
                    DB::raw("SUM(orders.total) as total"),
                    DB::raw("month(orders.created_at) as month")
                )
                ->join("users","users.userId","=","orders.userId")
                ->where("users.plan",$planType)
                ->where(DB::raw("YEAR(orders.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->orderBy("orders.created_at")
                ->groupBy(DB::raw("month(orders.created_at)"))
                ->get()
                ->toArray();
    }

    public function getColumnChartMoneyWeekly($planType)
    {
        return static::select("orders.*",
                    DB::raw("SUM(orders.total) as total"),
                    DB::raw("week(orders.created_at) as week")
                )
                ->join("users","users.userId","=","orders.userId")
                ->where("users.plan",$planType)
                ->where(DB::raw("YEAR(orders.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->orderBy("orders.created_at")
                ->groupBy(DB::raw("week(orders.created_at)"))
                ->get()
                ->toArray();
    }

    public function getColumnChartMoneyDay($planType)
    {
        return static::select("orders.*",
                    DB::raw("SUM(orders.total) as total"),
                    DB::raw("day(orders.created_at) as day")
                )
                ->join("users","users.userId","=","orders.userId")
                ->where("users.plan",$planType)
                ->where(DB::raw("MONTH(orders.created_at)"),DB::raw("MONTH(CURDATE())"))
                ->where(DB::raw("YEAR(orders.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->orderBy("orders.created_at")
                ->groupBy(DB::raw("day(orders.created_at)"))
                ->get()
                ->toArray();
    }

    public function getTotalOrderFromLastWeek($lastWeekNumber)
    {   
        return static::where(DB::raw("WEEK(orders.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(orders.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->count();
    }

    public function getTotalSalesFromLastWeek($lastWeekNumber)
    {
        return static::where(DB::raw("WEEK(orders.created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(orders.created_at)"),DB::raw("YEAR(CURDATE())"))
                ->sum('total');
    }

    public function isDailyLimitReachedForTrialUser($userId)
    {
        $reportPerDayInTrial = config('app.reportPerDayInTrial');

        $allOrders = DB::table('orders')
                    ->where('userId', $userId)
                    //->whereRaw('DATE_FORMAT(sub.trial_ends_at, "%Y-%m-%d") = ?)', [date("Y-m-d")])
                    ->whereRaw('DATE_FORMAT(created_at, "%Y-%m-%d") = ?', [date("Y-m-d")])
                    ->get();
                    //->toSql();

        if ($allOrders && count($allOrders) > 0) {
            if (count($allOrders) >= $reportPerDayInTrial) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        //print_r($allOrders);
        //print_r($allUsers->toArray());
        //die();
    }

}
