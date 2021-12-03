<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	protected $primaryKey='id';

	protected $fillable = ['name', 'tax'];

    public function City(){
        return $this->hasMany('App\City','province_id', 'id');
    }
}
