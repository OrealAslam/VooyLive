<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Neighborhood extends Model
{
    protected $fillable = ['name', 'long', 'lat', 'city_id', 'status'];

    public function getNeighborhood ($cityId, $longitude, $latitude)
    {
        // \DB::enableQueryLog();
        $data = DB::select("
            SELECT *, 
                ((ACOS(SIN(? * PI() / 180) * SIN(`lat` * PI() / 180) + COS(? * PI() / 180) * COS(`lat` * PI() / 180) * COS((? - `long`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `neighborhoods`
            WHERE city_id = ?
            HAVING `distance` <= ".config('app.radius')."
            ORDER BY `distance` ASC
            LIMIT 5", [$latitude, $latitude, $longitude, $cityId]
        );

        if (count($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
