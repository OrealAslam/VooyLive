<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
	protected $primaryKey='id';

	protected $fillable = ['user_id', 'report_id'];

    public function User(){
    	return $this->belongsTo('App\User','userId','user_id');
    }
	public function Report(){
    	return $this->belongsTo('App\Report','reportId','report_id');
    }
}
