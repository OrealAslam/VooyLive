<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         $this->call(ProvincesTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(NeighborhoodSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(PlansTableSeeder::class);
         
    }
}
