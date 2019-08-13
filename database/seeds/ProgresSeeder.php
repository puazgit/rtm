<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProgresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

	    for($i = 1; $i <= 20; $i++){
	        DB::table('tb_progres')->insert([
	        	'target' => $faker->numberBetween(50,100),
	        	'real' => $faker->numberBetween(50,100),
	        	'pjt1' => $faker->numberBetween(50,100),
	        	'id_uraian' => '1',
	        	'created_at' => \Carbon\Carbon::now(),
	        	'updated_at' => \Carbon\Carbon::now(),

	        ]);
	    }
    }
}
