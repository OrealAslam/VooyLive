<?php

use Illuminate\Database\Seeder;

class NeighborhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('neighborhoods')->insert([
            'name'=>'Arbutus Ridge',
            'long'=>'-123.1744',
            'lat'=>'49.2575',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Downtown',
            'long'=>'-123.1211',
            'lat'=>'49.2841',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Dunbar-Southlands',
            'long'=>'123.1852',
            'lat'=>'49.2500',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Fairview',
            'long'=>'-123.14786',
            'lat'=>'49.2658',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Grandview Woodland',
            'long'=>'-123.067',
            'lat'=>'49.275',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Hastings-Sunrise',
            'long'=>'-123.0574',
            'lat'=>'49.2780',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Kensington-Cedar Cottage',
            'long'=>'-123.0910',
            'lat'=>'49.24749',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Kerrisdale',
            'long'=>'-123.1775',
            'lat'=>'49.2202',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Killarney',
            'long'=>'-123.0574',
            'lat'=>'49.2178',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Kitsilano',
            'long'=>'-123.1974',
            'lat'=>'49.2682',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Marpole',
            'long'=>'123.1139',
            'lat'=>'49.2155',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Mount Pleasant',
            'long'=>'-123.1137',
            'lat'=>'49.2646',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Oakridge',
            'long'=>'-123.1166',
            'lat'=>'49.225',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Renfrew Collingwood',
            'long'=>'-123.0586',
            'lat'=>'49.2487',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Riley Park',
            'long'=>'-123.1216',
            'lat'=>'49.2449',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Shaughnessy',
            'long'=>'-123.1588',
            'lat'=>'49.2459',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'South Cambie',
            'long'=>'-123.1390',
            'lat'=>'49.2453',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Strathcona',
            'long'=>'-123.0874',
            'lat'=>'49.2791',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Sunset',
            'long'=>'-123.1094',
            'lat'=>'49.2190',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Victoria Fraserview',
            'long'=>'-123.0806',
            'lat'=>'49.2189',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'West End',
            'long'=>'123.134',
            'lat'=>'49.285',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'West Point Grey',
            'long'=>'-123.1997',
            'lat'=>'49.2645',
            'city_id'=>3,
            'status' => true
        ]);
        /*
        DB::table('neighborhoods')->insert([
            'name'=>'Vancouver CSD',
            'long'=>'',
            'lat'=>'',
            'city_id'=>3,
            'status' => true
        ]);
        DB::table('neighborhoods')->insert([
            'name'=>'Vancouver CMA',
            'long'=>'',
            'lat'=>'',
            'city_id'=>3,
            'status' => true
        ]);
    */


    }
}
