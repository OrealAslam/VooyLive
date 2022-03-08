<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportOverride extends Model
{
    protected $table = 'report_override';
    protected $fillable = ['households_with_children', 'average_household_income', 'median_age', 'el_name', 'el_address', 'el_grade', 'el_distance', 'ju_name', 'ju_address', 'ju_grade', 'ju_distance', 'se_name', 'se_address', 'se_grade', 'se_distance', 'one_name', 'one_distance','two_name', 'two_distance', 're_name', 're_type', 're_distance', 'bus_name', 'bus_address', 'bus_distance', 'train_name', 'train_address', 'train_distance', 'lib_name', 'lib_address', 'lib_distance', 'res_one_name', 'res_one_address', 'res_one_distance', 'res_two_name', 'res_two_address', 'res_two_distance', 'bank_one_name', 'bank_one_address', 'bank_one_distance', 'bank_two_name', 'bank_two_address', 'bank_two_distance', 'store_one_name', 'store_one_address', 'store_one_distance', 'store_two_name', 'store_two_address', 'store_two_distance', 'gas_one_name', 'gas_one_address', 'gas_one_distance', 'gas_two_name', 'gas_two_address', 'gas_two_distance', 'cafe_one_name', 'cafe_one_address', 'cafe_one_distance', 'cafe_two_name', 'cafe_two_address', 'cafe_two_distance', 'gym_one_name', 'gym_one_address', 'gym_one_distance', 'gym_two_name', 'gym_two_address', 'gym_two_distance', 'neighbourhood_name'];
    public $timestamps = false;
}
