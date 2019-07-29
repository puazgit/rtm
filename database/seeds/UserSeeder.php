<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

	    for($i = 1; $i <= 50; $i++){
	        DB::table('users')->insert([
	        	'name' => $faker->name,
	        	'email' => str_random(10).'@gmail.com',
	        	'email_verified_at' => \Carbon\Carbon::now(),
	        	'password' => bcrypt('abcd1234'),
	        	'remember_token' => '',
	        	'created_at' => \Carbon\Carbon::now(),
	        	'updated_at' => \Carbon\Carbon::now(),

	        ]);
	    }
    }
}
