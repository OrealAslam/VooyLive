<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UniversalLibrary extends Model
{
    protected $fillable = ['name', 'long', 'lat', 'city_id', 'status'];

    public function getNearestLibrary($longitude, $latitude, $limit, $city = "")
    {
        $sql = "SELECT name,address,  
            ((ACOS(SIN(? * PI() / 180) * SIN(`lat` * PI() / 180) + COS(? * PI() / 180) * COS(`lat` * PI() / 180) * COS((? - `long`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
        FROM
            `universal_library`";
        if ($city)
            $sql .= " WHERE LOWER(city) like '" . str_replace("'","\'",$city) . "' ";
        else
            $sql .= " WHERE 1 ";
        $sql .= "HAVING `distance` <= " . config('app.radius') . "
            ORDER BY `distance` ASC
            LIMIT ?";
        $data = DB::select(
            $sql,
            [$latitude, $latitude, $longitude, $limit]
        );

        return $data;
    }
}
