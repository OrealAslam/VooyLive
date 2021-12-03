<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*-------------------------------------*/
        DB::table('plans')->insert([
            'planId'=>'payasyougo',
            'amount'=>0,
            'name'=>'Pay As You Go',
            'interval'=>'year',
            'trial_period_days'=>14,
            'status'=>1,
            'team_member'=>NULL,
        ]); 

        DB::table('plans')->insert([
            'planId'=>'monthly',
            'amount'=>2499,
            'name'=>'Monthly',
            'trial_period_days'=>14,
            'interval'=>'month',
            'status'=>'1',
            'team_member'=>NULL,
        ]);

        DB::table('plans')->insert([
            'planId'=>'yearly',
            'amount'=>23988,
            'name'=>'Yearly',
            'trial_period_days'=>14,
            'interval'=>'year',
            'status'=>'1',
            'team_member'=>NULL,
        ]);

        DB::table('plans')->insert([
            'planId'=>'payasyougo-30daytrial',
            'amount'=>0,
            'name'=>'Pay As You Go 30 Day Trial',
            'interval'=>'year',
            'trial_period_days'=>30,
            'status'=>1,
            'team_member'=>NULL,
        ]); 

        DB::table('plans')->insert([
            'planId'=>'monthly-30daytrial',
            'amount'=>2499,
            'name'=>'Monthly 30 Day Trial',
            'trial_period_days'=>30,
            'interval'=>'month',
            'status'=>'1',
            'team_member'=>NULL,
        ]);

        DB::table('plans')->insert([
            'planId'=>'yearly-30daytrial',
            'amount'=>23988,
            'name'=>'Yearly 30 Day Trial',
            'trial_period_days'=>30,
            'interval'=>'year',
            'status'=>'1',
            'team_member'=>NULL,
        ]);

        DB::table('plans')->insert([
            'planId'=>'price_0IJH6J6XuKJXwgi0X1yWXWF0',
            'amount'=>180,
            'name'=>'Team Plan - 5 Users',
            'trial_period_days'=>14,
            'interval'=>'yearly',
            'status'=>'1',
            'team_member'=>5,
            'is_team'=>1,
        ]);

        DB::table('plans')->insert([
            'planId'=>'price_0IJH8F6XuKJXwgi0B7HJ3t4a',
            'amount'=>168,
            'name'=>'Team Plan - 10 Users',
            'trial_period_days'=>14,
            'interval'=>'yearly',
            'status'=>'1',
            'team_member'=>10,
            'is_team'=>1,
        ]);

        DB::table('plans')->insert([
            'planId'=>'price_0IJH8p6XuKJXwgi06VMg07km',
            'amount'=>156,
            'name'=>'Team Plan - 15 Users',
            'trial_period_days'=>14,
            'interval'=>'yearly',
            'status'=>'1',
            'team_member'=>15,
            'is_team'=>1,
        ]);

        DB::table('plans')->insert([
            'planId'=>'price_0IJH9e6XuKJXwgi0UANn1Aml',
            'amount'=>144,
            'name'=>'Team Plan - 20 Users',
            'trial_period_days'=>14,
            'interval'=>'yearly',
            'status'=>'1',
            'team_member'=>20,
            'is_team'=>1,
        ]);

        DB::table('plans')->insert([
            'planId'=>'price_0IJHAS6XuKJXwgi08xJe2ebj',
            'amount'=>132,
            'name'=>'Team Plan - 25 Users',
            'trial_period_days'=>14,
            'interval'=>'yearly',
            'status'=>'1',
            'team_member'=>25,
            'is_team'=>1,
        ]);

        // DB::table('plans')->insert([
        //     'planId'=>'price_0IIVtz6XuKJXwgi0xF7brDZx',
        //     'amount'=>200,
        //     'name'=>'Team Plan',
        //     'trial_period_days'=>NUll,
        //     'interval'=>'year',
        //     'status'=>'1',
        // ]);

       /*   */
    }
}
