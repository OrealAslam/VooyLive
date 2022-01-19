<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OntarioSchool extends Model
{
    protected $fillable = ['name', 'long', 'lat', 'city_id', 'status'];

    public function getNearestSchool($longitude, $latitude, $limit, $type, $city = "")
    {
        $sql = "SELECT name,address,grade,  
            ((ACOS(SIN(? * PI() / 180) * SIN(`lat` * PI() / 180) + COS(? * PI() / 180) * COS(`lat` * PI() / 180) * COS((? - `long`) * PI() / 180)) * 180 / PI()) * 60 * 1.1515 * 1.609344) AS `distance`
        FROM
            `ontario_school`";
        if ($city)
            $sql .= " WHERE LOWER(city) like '" . str_replace("'", "\'", $city) . "' ";
        else
            $sql .= " WHERE 1 ";

        $sql .= " AND LOWER(level) = '" . $type . "'  ";
        $sql .= "HAVING `distance` <= " . config('app.radius') . "
            ORDER BY `distance` ASC
            LIMIT ?";
        $data = DB::select(
            $sql,
            [$latitude, $latitude, $longitude, $limit]
        );

        return $data;
    }

    public function getElementarySchool($longitude, $latitude,  $city)
    {
        $type = 'elementary';
        $result = $this->getNearestSchool($longitude, $latitude, 1, $type, $city);
        if (!count($result))
            $result = $this->getNearestSchool($longitude, $latitude, 1, $type);

        if (isset($result[0]))
            return $result[0];
        else
            return null;
    }

    public function getHighSchool($longitude, $latitude,  $city)
    {
        $type = 'secondary';
        $result = $this->getNearestSchool($longitude, $latitude, 1, $type, $city);
        if (!count($result))
            $result = $this->getNearestSchool($longitude, $latitude, 1, $type);

        if (isset($result[0]))
            return $result[0];
        else
            return null;
    }
}
