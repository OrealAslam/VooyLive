<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demographic extends Model
{
	protected $table = 'demographic';

    public function getDemographicData ($cityId, $neighborhoodId)
    {
    	$data = DB::table($this->table)->where('city_id', $cityId)->where('neighborhood_id', $neighborhoodId)->first();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
}
