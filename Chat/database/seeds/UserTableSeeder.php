<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory('App\User', 500)->create();

//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'admin@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);
    }
}
