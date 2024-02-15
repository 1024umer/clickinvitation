<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
    	    'name' => 'Admin',
    	    'email' => 'jeep@urbangames.com',
    	    'password' => '$2y$10$eu.Iu1rhnPCC1LNgyRBz3uURlc9wQ9oj7I4G/8d9k7wwGpXtGYnfi',
    	]);

    }
}