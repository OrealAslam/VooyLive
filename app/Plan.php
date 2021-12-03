<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
  	protected $fillable =['planId','name','interval','trial_period_days','amount','status', 'is_team', 'team_member'];

	public function getPlan()
  	{
  		return static::get();
  	}

    public function RegisterLinks(){
        return $this->hasMany('App\RegisterLinks','plan_id', 'planId');
    }

    public function getTeamMemberAttribute($value)
	{
		if (is_null($value)) {
			return 0;
		}

		return $value;
	}

}
