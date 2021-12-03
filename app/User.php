<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use DB;

class User extends Authenticatable{
    use Notifiable;
    use Billable;


    // User Type
    // 1 = Team Leader
    // 2 = Sub User

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
	protected $table = 'users';
    protected $primaryKey='userId';
    protected $fillable = [
        'plan', 'email', 'firstName','lastName','region','password','email','confirm_password','email_token', 'referral_code', 'stripe_id','user_type','parent_id','verified','is_allow_multiple_survey','profilecolor_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function planMaster(){
       return $this->hasOne('App\Plan','planId','plan');
    }
    public function transactions(){
        return $this->hasMany('App\Transactions','userId','userId');
    }
    public function getBalance(){
        return $this->transactions()->sum('amount');
    }
    public function ClientDetail(){
        return $this->hasOne('App\ClientDetail','userId','userId');
    }
    public function teamLeader(){
        return $this->hasOne('App\User','userId','parent_id');
    }
    public function City(){
        return $this->hasOne('App\City','id','region');
    }

    public function profileColor(){
        return $this->hasOne('App\ProfileColor','id','profilecolor_id');
    }

    public function orders(){
        return $this->hasMany('App\Order','userId','userId');
    }

    public function UserReport(){
        //return $this->hasMany('App\UserReport','user_id','userId');
        //return $this->hasManyThrough('App\UserReport', 'App\Report', 'reportId', 'user_id' , 'userId');
        //public function hasManyThrough($related, $through, $firstKey = n, ull, $secondKey = null, $localKey = null)
    }

    public function taxPercentage() {
        if ($this->City && $this->City->Province && $this->City->Province->tax) {
            return $this->City->Province->tax;
        } else {
            return 0;
        }
    }

    public function getPlanTotal($planType)
    {
        return static::where("plan",$planType)->count();
    }

    public function getPlanFromLastWeekTotal($planType,$lastWeekNumber)
    {
        return static::where("plan",$planType)
                ->where(DB::raw("WEEK(created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(created_at)"),DB::raw("YEAR(CURDATE())"))
                ->count();
    }

    public function getTotalUser()
    {
        return static::where("role","client")->count();   
    }

    public function getTotalCustmorFromLastWeek($lastWeekNumber)
    {
        return static::where("role","client")
                ->where(DB::raw("WEEK(created_at)"),$lastWeekNumber)
                ->where(DB::raw("YEAR(created_at)"),DB::raw("YEAR(CURDATE())"))
                ->count();
    }

    public function flyers(){
        return $this->hasMany('App\Flyer','user_id','userId');
    }

    public function hdis(){
        return $this->hasMany('App\Hdi','user_id','userId');
    }

    public function icons(){
        return $this->hasMany('App\Icon','user_id','userId');
    }

    public function credits(){
        return $this->hasMany('App\Credit', 'user_id', 'userId');
    }

    public function debits(){
        return $this->hasMany('App\UserDebit','user_id','userId');
    }

    public function referrals(){
        return $this->hasMany('App\Credit', 'referred_by', 'userId');
    }

    public function referrers(){
        return $this->hasMany('App\Credit', 'referred_to', 'userId');
    }

    public function getBalanceCredits(){
        return $this->credits()->sum('credit');
    }
    public function getPositiveCredits(){
        return $this->credits()->where('credit','>' ,0)->sum('credit');
    }
    public function getNegativeCredits(){
        return $this->credits()->where('credit','<' ,0)->sum('credit');
    }

    public function currentCreditUser()
    {
        return $this->hasMany('App\Credit', 'user_id', 'userId')->sum('credit');
    }
    public function currentCreditUserDebit()
    {
        return $this->hasMany('App\UserDebit', 'user_id', 'userId')->sum('debit');
    }

    public function userCredit()
    {
        return $this->credits()->sum('credit') - $this->debits()->sum('debit');
    }
}
