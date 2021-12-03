<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PointOfInterest extends Model
{
    public function getPointOfInterestData ($cityId, $longitude, $latitude, $type)
    {
        //\DB::enableQueryLog();

        $data = DB::select("
            SELECT *, 
                ((ACOS(SIN(? * PI() / 180) * SIN(`latitude` * PI() / 180) + COS(? * PI() / 180) * COS(`latitude` * PI() / 180) * COS((? - `longitude`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `point_of_interest`
            WHERE `city_id` = ?  AND `category` = ?
            HAVING `distance` <= ".(config('app.radius')/1000)."
            ORDER BY `distance` ASC
            LIMIT 2", [$latitude, $latitude, $longitude, $cityId, $type]
        );


        /*
        $data = DB::select("
            SELECT *, 
                ((ACOS(SIN($latitude * PI() / 180) * SIN(`SCHOOL_LATITUDE` * PI() / 180) + COS($latitude * PI() / 180) * COS(`SCHOOL_LATITUDE` * PI() / 180) * COS(($longitude - `SCHOOL_LONGITUDE`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
            FROM
                `schools`
            WHERE `DISTRICT_LONG_NAME_THIS_ENROL` like \"%$cityId%\" AND `ORGANIZATION_EDUCATION_LEVEL` like \"%$schoolType%\"
            HAVING `distance` <= ".(config('app.radius')/1000)."
            ORDER BY `distance` ASC
            LIMIT 2"
        );
        */
        //echo '<pre>';
        //dd(\DB::getQueryLog());
        //print_r(DB::getQueryLog());
        //die();
        
        //print_r($data);
        //die();

        if (count($data)) {
            return $data;
        } else {
            return false;
        }
    }
}
