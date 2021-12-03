<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'Odiri',
            'lastName' => 'Mike-Ifeta',
            'role'=>'admin',
            'email' => 'odiri@communityfeaturesheet.com',
            'region'=>1,
            'verified' => 1,
            'password' => bcrypt('secret'),
        ]);
        DB::table('client_details')->insert([
            'userId'=> 1,
            'title' => 'Odiri Mike-Ifeta',
        ]);

        /*
        DB::table('users')->insert([
            'firstName' => 'shan',
            'lastName' => 'khan',
            'email' => 'test@gmail.com',
            'role'=>'client',
            //'stripe_id'=>'cus_BdJnsY0fR8xO5E',
            'region'=>1,
            'password' => bcrypt('secret'),
        ]);
        DB::table('client_details')->insert([
            'userId'=> 2,
            'title' => 'shan khan Title',
        ]);   
        */        
    }
}
