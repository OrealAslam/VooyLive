<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('provinces')->insert([
            'name'=>'Alberta',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'British Columbia',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Manitoba',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'New Brunswick',
            'tax'=>15,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Newfoundland and Labrador',
            'tax'=>15,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Northwest Territories',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Nova Scotia',
            'tax'=>15,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Nunavut',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Ontario',
            'tax'=>13,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Quebec',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Prince Edward Island',
            'tax'=>15,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Saskatchewan',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Yukon',
            'tax'=>5,
        ]);
        DB::table('provinces')->insert([
            'name'=>'Other',
            'tax'=>15,
        ]);
    }
}
