<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UniversalRecreation extends Model
{
    protected $fillable = ['name', 'long', 'lat', 'city_id', 'status'];

    public function getNearestPark($longitude, $latitude, $limit)
    {
        // \DB::enableQueryLog();
        $data = DB::select("
            SELECT distinct name,type,  
                ((ACOS(SIN(? * PI() / 180) * SIN(`lat` * PI() / 180) + COS(? * PI() / 180) * COS(`lat` * PI() / 180) * COS((? - `long`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `universal_recreation`
            WHERE `type` = 'park'
            HAVING `distance` <= ".config('app.radius')."
            ORDER BY `distance` ASC
            LIMIT ?", [$latitude, $latitude, $longitude, $limit]
        );

        return $data;

    }
    public function getNearestLibrary($longitude, $latitude, $limit)
    {
        // \DB::enableQueryLog();
        $data = DB::select("
            SELECT distinct name,type, 
                ((ACOS(SIN(? * PI() / 180) * SIN(`lat` * PI() / 180) + COS(? * PI() / 180) * COS(`lat` * PI() / 180) * COS((? - `long`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `universal_recreation`
            WHERE LOWER(name) like '%library%'
            ORDER BY `distance` ASC
            LIMIT ?", [$latitude, $latitude, $longitude, $limit]
        );

        return $data;
      
    }
    public function getNearestRecreation($longitude, $latitude, $limit)
    {
        // \DB::enableQueryLog();
        $data = DB::select("
            SELECT distinct name,type, 
                ((ACOS(SIN(? * PI() / 180) * SIN(`lat` * PI() / 180) + COS(? * PI() / 180) * COS(`lat` * PI() / 180) * COS((? - `long`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `universal_recreation`
            WHERE `type` != 'park'
            ORDER BY `distance` ASC
            LIMIT ?", [$latitude, $latitude, $longitude, $limit]
        );

        return $data;
      
    }
}
